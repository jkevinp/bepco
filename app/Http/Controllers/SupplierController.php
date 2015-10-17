<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Repositories\Contracts\SupplierContract;

class SupplierController extends Controller
{
    public function __construct(SupplierContract $sc){
        $this->supplier = $sc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $suppliers = $this->supplier->all();
        return view('self.blade.supplier.list')->with(compact('suppliers'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('self.blade.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v= $this->supplier->validateStore($request);
        if($v->fails())return redirect()->back()->withErrors($v->messages()->first());
        if($this->supplier->store($request))
            return redirect()->back()->with('flash_message' , 'Supplier has been saved');
        return redirect()->back()->withErrors('Could not save supplier.'); 
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
