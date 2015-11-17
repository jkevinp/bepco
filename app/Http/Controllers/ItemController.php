<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
//interfaces
use bepc\Repositories\Contracts\ItemContract;
use bepc\Repositories\Contracts\ItemGroupContract;
use DB;
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
    public function SetReOrder(Request $request){

        if($request->has('id') && $request->has('optimal_order_qty') && $request->has('reorder_point')){
            $item = $this->item->find($request->get('id'));
            
            if($item){
                $item->safe_quantity = $request->get('optimal_order_qty');
                $item->alert_quantity = $request->get('reorder_point');
                if($item->save())return redirect(route('item.list'))->with('flash_message' , 'Reorder point & quantity successfully saved.');
                return redirect()->back()->withErrors('Could not save item.');
            }else return redirect(route('item.list'))->withErrors('Could not find item.');
        }
    }
    public function index()
    {
        $items = $this->item->all();
        return view('self.blade.item.list')->withItems($items);
    }
    public function reorder($id, $auto = false){
        $item = $this->item->find($id);
        $lastyear = date("Y-m-d",strtotime("-1 year", time()));  
        $used = 0;
        $logs = DB::table('inventorylog')
        ->where('action' , '=' , 'withdraw')
        ->where('param_id' ,'=' ,$item->id)
        ->where('table' , '=' , get_class($item))
        ->whereDate('created_at' , ">=" , $lastyear)->get();
        if(!$item)return redirect(route('item.list'))->withErrors('Could not find item');
        
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
        return view('self.blade.item.reorder')->with(compact('item' ,'used' ,'logs'));
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
        if($this->item->store($request)) return redirect()->back()->with('flash_message' , 'Item has been successfully saved.');
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
    public function edit($id ,$name = false)
    {
        if($id){
            if($item = $this->item->find($id)){
                if(!$name)return redirect(route('item.edit' ,[$id,  $item->name]));
                $itemgroups = $this->itemgroup->all()->lists('name' , 'id');
                return view('self.blade.item.edit')->with(compact('itemgroups' , 'item'));
            }else{
                return redirect()->back()->withErrors('Could not find Item');
            }
        }return redirect(route('item.list'))->withErrors('Item ID is required.');
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
        return redirect(route('item.list'))->withErrors('Item ID is required.');
    }
    public function proccessWithdrawal(Request $r){
        $input = $r->all();
        //validation
        if($r->has('user_id') && $r->has('id') && $r->has('details') && $r->has('quantity')){
        $user = $this->user->find($input['user_id']);
        if( $item = $this->item->find($input['id'])){
           if( $this->item->deduct($item ,$user , $input['quantity'], $input['details']))
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
       if( $item = $this->item->find($input['id'])){
            if( $this->item->induct($item ,$user , $input['quantity'], $input['details']))
            return redirect()->back()->with('flash_message' , "Proccess has been saved!");
        }
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
        if($id){
            if($item = $this->item->find($id)){
                //validation
                $result = $this->item->update($item,$request);
                if($result) return redirect()->back()->with('flash_message' , "Item changes saved.");
                return redirect()->back()->withErrors('Failed to update item');
            }else{
                 return redirect()->back()->withErrors('Could not find Item');
            }
        }
        return redirect(route('item.list'))->withErrors('Item ID is required');
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
