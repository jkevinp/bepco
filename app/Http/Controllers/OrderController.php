<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use Response;
use bepc\Http\Controllers\Controller;
use bepc\Libraries\Generic\Helper;

use bepc\Models\Order;
use bepc\Models\OrderDetail;
use bepc\Repositories\Contracts\CustomerContract;

use bepc\Repositories\Contracts\ProductContract;
use bepc\Repositories\Contracts\RecipeContract;
use Auth;
class OrderController extends Controller
{

    public function __construct(CustomerContract $cc , ProductContract $pc , RecipeContract $rc){
        $this->customer = $cc;
        $this->product= $pc;
        $this->recipe = $rc;
        $this->middleWare('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $fieldlist = (new Order)->getShowables();
        return view('self.blade.order.list')->with(compact('orders' , 'fieldlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= \bepc\Models\Product::all();
        $customers = $this->customer->all();
        return view('self.blade.order.create')->with(compact('products' , 'customers'));        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function placeOrder(Request $request){
        $input = $request->all();

          if($request->has('startdate') && $request->has('enddate')){
                $orders= Order::whereDate('deliverydate', '>=' , $input['startdate'])
                        ->whereDate('deliverydate' ,'<=' , $input['enddate'])
                        ->where('status' , '=' , 'created')->get();
                foreach ($orders as $order) {
                    $order->status ='items ordered';
                    if($order->save()){

                    }else{
                         foreach ($orders as $order) {
                            $order->status ='created';
                            return redirect()->back()->withErrors("Aborted due to undefined error. Please try again");
                         }
                    }
                }
            }
        else return redirect()->back()->withErrors('Something went wrong with date information. Please try again');
        return redirect(route('order.list'))->with('flash_message' , 'Orders has been updated!');
    }

    public function save(Request $request)
    {
        $input = $request->all();
        
        if(!Auth::check())return Response::json('Session Expired! Please login again');
        if(!$request->has('deliverydate'))return Response::json('Delivery Date is required!');
        if(!$request->has('data'))return Response::json('No items in cart.');
        if(!$request->has('type') )return Response::json('Customer Type not found.');
        if(!$request->has('customerdata'))return Response::json('Customer Data not found');


        if($request->get('type') === 'create'){
            if($customer = $this->customer->store($request->get('customerdata'))){
                //return Response::json($customer);
            }else{
                return Response::json('Could not save customer data. Please try again.');
            }
            //return Response::json(['response' => $request->get('customerdata')]);
        }else{
           if($customer = $this->customer->find($request->get('customerdata')['id'])){

           }else{
              return Response::json('Could not find customer data. Please try again.');
           }

        }

        $input['id'] = Helper::generate_id('ORDER-', str_random(3));
        $input['deliverydate'] = $request->get('deliverydate');
        $input['description'] = !empty($request->get('details')) ?  $request->get('details'): 'Auto Generated Order';
        $input['status'] = 'created';
        $input['customer_id'] = $customer->id;
        $input['creator_id'] = Auth::user()->id;
        $order = Order::create($input);
        $data = $request->get('data');
        foreach ($data as $key => $value) {
            OrderDetail::create([
                 'id' => Helper::generate_id('ORDET-', str_random(5)),
                 'order_id' =>$order->id,
                 'product_id' => $value[0],
                 'product_quantity' => $value[1] 
            ]);
        }
        if($order && $customer)return Response::json('Successfully saved customer order.');
        return Response::json("Something went wrong. Please Try again.");
    }

    public function generateOrder(){
        return view('self.blade.order.generateOrder');
    }
    public function selectOrders(Request $request){
        $input = $request->all();
            
        if($request->has('startdate') && $request->has('enddate')){
            $orders= Order::whereDate('deliverydate', '>=' , $input['startdate'])
                        ->whereDate('deliverydate' ,'<=' , $input['enddate'])
                        ->where('status' , '=' , 'created')->get();

            $toorder = [];
            foreach ($orders as $order) {
                foreach ($order->OrderDetail as $od) {
                    if(isset($toorder[$od->product_id]))
                    $toorder[$od->product_id]['orderquantity'] += $od->product_quantity;
                    else{
                        $toorder[$od->product_id]['orderquantity'] = $od->product_quantity;
                        $toorder[$od->product_id]['product'] = $this->product->find($od->product_id);
                        $toorder[$od->product_id]['recipename'] = $this->product->find($od->product_id)->pluck('name');    
                        $toorder[$od->product_id]['recipeid'] = $this->product->find($od->product_id)->pluck('id');
                        $toorder[$od->product_id]['ingredient'] = $this->recipe->find($this->product->find($od->product_id)->recipe->first()->id)->ingredient;
                        
                    }

                }
            }
        }
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
         return view('self.blade.order.generate2')->with(compact('toorder' , 'orders' ,'startdate' ,'enddate'));
      //   var_dump($toorder); 
      //  return redirect()->back()->withErrors('Please Specify Start and end date');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(Request $request, $id)
    {
        //
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
}
