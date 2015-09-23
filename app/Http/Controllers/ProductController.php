<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Product;
use URL;
use bepc\Models\Ingredient;
use bepc\Models\Recipe;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('self.blade.product.list')->withProduct(Product::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('self.blade.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        $image = $request->file('file');
        if(strpos($image->getClientMimeType(),'image') !== FALSE){
            $upload_folder ='img-product/';
            $file_name = str_random(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path($upload_folder).'/', $file_name);
            echo URL::asset($upload_folder . $file_name);  // get upload file url
            $input['imageurl'] = $upload_folder.$file_name;
           
            $p =  Product::create($input);
            return redirect(route('product.show' , $p->id))->with('flash_message' , 'Product saved!');
           }else{
            return redirect()->back->withErrors('Failed to save product');  
         }
        //$p->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $ids= $order->orderdetail->lists('product_id' , 'product_quantity');
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
}
