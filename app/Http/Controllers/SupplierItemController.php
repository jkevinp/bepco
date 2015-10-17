<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Repositories\Contracts\SupplierItemContract;
use bepc\Repositories\Contracts\SupplierContract;

use bepc\Repositories\Contracts\ItemContract;
class SupplierItemController extends Controller
{
    public function __construct(SupplierItemContract $sic, SupplierContract $sc,ItemContract $ic){
        $this->supplieritem = $sic;
        $this->supplier = $sc;
        $this->item = $ic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = $this->item->all();
        $suppliers = $this->supplier->all();
        return view('self.blade.supplieritem.create')->with(compact('items', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v= $this->supplieritem->validateStore($request);
        if($v->fails()){
            return redirect()->back()->withErrors($v->messages()->first());
        }
        if($this->supplieritem->store($request))return redirect()->back()->with('flash_message' ,'Supplier Item saved');
        return redirect()->back()->withErrors('Could not save supplier item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
