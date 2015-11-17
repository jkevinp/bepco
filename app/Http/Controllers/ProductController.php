<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Product;
use URL;
use bepc\Models\Ingredient;
use bepc\Models\Recipe;
use bepc\Repositories\Contracts\ProductContract;
use bepc\Repositories\Contracts\UserContract;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductContract $pc , UserContract $uc){
        $this->user = $uc;
        $this->middleWare('auth');
        $this->product = $pc;
    }

    public function index(){
        return view('self.blade.product.list')->withProduct($this->product->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('self.blade.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if($product = $this->product->store($request)){
            return redirect(route('product.show' , $product->id))->with('flash_message' , 'Product saved!');
        }
        return redirect()->back->withErrors('Failed to save product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = false)
    {
        $id  = substr($id, 0,strlen($id) -1);
        $product =Product::find($id);
        return view('self.blade.product.show')->with(compact('product'));   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $image = $request->file('file');
        $p = Product::find($input['id']);
        $p->name = $input['name'];
        $p->price = $input['price'];
        if($image){
            $upload_folder ='img-product/';
            $file_name = str_random(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path($upload_folder).'/', $file_name);
            $input['imageurl'] = $upload_folder.$file_name;
            $p->imageurl = $input['imageurl'];
        }   
      
        if($p->save())return redirect(route('product.show' , $p->id))->with('flash_message' , 'Product saved!');
        return redirect()->back->withErrors('Failed to save product');  
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function compute($orderid = false){
        if(!$orderid){
            $recipe = Recipe::all()->lists('product_id');
            $products = Product::whereIn('id' , $recipe)->lists('name', 'id');
           
            //$products = Product::with('recipe' ,'recipe_id')->lists('name', 'id');
           
        }
        $order = \bepc\Models\Order::find($orderid);
        $ids= $order->orderdetail->lists('product_id');
        $products = Product::whereIn('id', $ids)->lists('name', 'id');
        return view('self.blade.product.compute')->with(compact('products' , 'ids'));
        
    }
    public function processcomputation(Request $request){
        $input = $request->all();
        $data = $input['data'];
        $products = [];
          $order = [];
        foreach ($data as $v) {
           $product= Product::find($v[0]);
           $recipe = $product->recipe;
             foreach ($recipe as $key => $value) {
            $ingredients = Ingredient::where('recipe_id' , '=' , $value['id'])->get();
                foreach ($ingredients as $ingredient) {
                    array_push($order, ['name' => $ingredient->name ,  'quantity' => $ingredient->quantity * $v[1]]);
                }
            }

        }
        //$product = Product::find($input['data']);
        $recipe = $product->recipe;

      
      
        return $order;
    }

    public function deposit($id = false){
        if($id){
            $product = $this->product->find($id);
            if(!$product)return $this->redirect()->back()->withErrors('The Id you specified is not a valid product');
            return view('self.blade.product.deposit')->withItem($product);
        }
        return redirect(route('product.list'))->withErrors('Item ID is required.');
    }

    public function withdraw($id = false){
        if($id){
            $product = $this->product->find($id);
            if(!$product)return $this->redirect()->back()->withErrors('The Id you specified is not a valid product');
            return view('self.blade.product.withdraw')->withItem($product);
        }
    }
   
    public function proccessWithdrawal(Request $r){
        $input = $r->all();
        //validation
        if($r->has('user_id') && $r->has('id') && $r->has('details') && $r->has('quantity')){
        $user = $this->user->find($input['user_id']);
        if( $product = $this->product->find($input['id'])){
           if( $this->product->deduct($product ,$user , $input['quantity'], $input['details']))
            return redirect()->back()->with('flash_message' , "Proccess has been saved!");
        }
        }
        return redirect()->back()->withErrors('Failed to process withdrawal');

    }
    public function proccessDeposit(Request $r){
        $input = $r->all();
        //validation
        if($r->has('user_id') && $r->has('id') && $r->has('details') && $r->has('quantity')){
            $user = $this->user->find($input['user_id']);
            if( $product = $this->product->find($input['id'])){
                if( $this->product->induct($product ,$user , $input['quantity'], $input['details']))
                return redirect()->back()->with('flash_message' , "Proccess has been saved!");
            }
        }
        return redirect()->back()->withErrors('Failed to process deposit');
    }

    public function reorder($id, $auto = false){
        $item = $this->product->find($id);
        $lastyear = date("Y-m-d",strtotime("-1 year", time()));  
        $used = 0;
        $logs = DB::table('inventorylog')
        ->where('action' , '=' , 'withdraw')
        ->where('param_id' ,'=' ,$item->id)
        ->where('table' , '=' , get_class($item))
        ->whereDate('created_at' , ">=" , $lastyear)->get();
        if(!$item)return redirect(route('product.list'))->withErrors('Could not find product');
        
        if($auto){
            $withdrawn = DB::table('inventorylog')
                ->select(DB::raw("SUM(param) as count"))
                ->where('param_id' ,'=' ,$item->id)
                ->where('action' ,'=' , 'withdraw')
                ->whereDate('created_at' , ">=" , $lastyear)
                ->where('table' , '=' , get_class($item))
                ->first();
            $used = $withdrawn->count;
        }
        return view('self.blade.product.reorder')->with(compact('item' ,'used' ,'logs'));
    }

      public function SetReOrder(Request $request){

        if($request->has('id') && $request->has('optimal_order_qty') && $request->has('reorder_point')){
            $item = $this->product->find($request->get('id'));
            if($item){
                $item->safe_quantity = $request->get('optimal_order_qty');
                $item->alert_quantity = $request->get('reorder_point');
                if($item->save())return redirect(route('product.list'))->with('flash_message' , 'Reorder point & quantity successfully saved.');
                return redirect()->back()->withErrors('Could not save item.');
            }else return redirect(route('product.list'))->withErrors('Could not find item.');
        }
    }


}
