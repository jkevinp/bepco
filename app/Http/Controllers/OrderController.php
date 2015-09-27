<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use Response;
use bepc\Http\Controllers\Controller;
use bepc\Libraries\Generic\Helper;

use bepc\Models\Order;
use bepc\Models\OrderDetail;

class OrderController extends Controller
{
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
        return view('self.blade.order.create')->with(compact('products'));        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $input['id'] = Helper::generate_id('ORDER-', str_random(3));
        $input['deliverydate'] = date('Y-m-d');
        $input['description'] = 'Auto Generated Order';
        $input['status'] = 'created';
        $input['customer_id'] = 1;
        $input['creator_id'] = 1;
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
        return Response::json('okay');
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
