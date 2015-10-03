<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
//interfaces
use bepc\Repositories\Contracts\ItemContract;
use bepc\Repositories\Contracts\ItemGroupContract;

use bepc\Repositories\Contracts\UserContract;
class ItemController extends Controller
{
    public  function __construct(ItemContract $ic , ItemGroupContract $igc , UserContract $uc) {
        $this->item = $ic;
        $this->itemgroup = $igc;
        $this->user = $uc;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->item->all();
        return view('self.blade.item.list')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemgroups= $this->itemgroup->all()->lists('name' , 'id');
        return view('self.blade.item.create')->with(compact('itemgroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->item->store($request))
            return redirect()->back()->with('flash_message' , 'Item has been successfully saved.');

        return redirect()->back()->withInput($request->all())->withErrors('Item could not be saved');
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
    public function withdraw($id = false){
        if($id){
            $item = $this->item->find($id);
            if(!$item)return $this->redirect()->back()->withErrors('The Id you specified is not a valid item');

            return view('self.blade.item.withdraw')->withItem($item);
        }
    }
    public function deposit($id = false){
        if($id){
            $item = $this->item->find($id);
            if(!$item)return $this->redirect()->back()->withErrors('The Id you specified is not a valid item');

            return view('self.blade.item.deposit')->withItem($item);
        }
    }
    public function proccessWithdrawal(Request $r){
    
        $input = $r->all();
        //validation
        $user = $this->user->find($input['user_id']);
       if( $item = $this->item->find($input['id'])){
           if( $this->item->deduct($item ,$user , $input['quantity']))
            return redirect()->back()->with('flash_message' , "Proccess has been saved!");

       }
        return redirect()->back()->withErrors('Failed to process withdrawal');

    }
    public function proccessDeposit(Request $r){
    
        $input = $r->all();
        //validation
        $user = $this->user->find($input['user_id']);
       if( $item = $this->item->find($input['id'])){
            if( $this->item->induct($item ,$user , $input['quantity']))
            return redirect()->back()->with('flash_message' , "Proccess has been saved!");
       }
        return redirect()->back()->withErrors('Failed to process deposit');

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
