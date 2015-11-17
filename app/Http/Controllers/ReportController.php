<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Repositories\Contracts\ItemContract;
use bepc\Repositories\Contracts\UserContract;
use bepc\Repositories\Contracts\SupplierContract;
use bepc\Repositories\Contracts\ProductContract;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductContract $pc , UserContract $uc , SupplierContract $sc , ItemContract $ic){
        $this->item = $ic;
        $this->product = $pc;
        $this->supplier = $sc;
        $this->user = $uc;
        $this->middleWare('auth');
    }

    public function generate(Request $r){
        if($r->has('check_list') && $r->has('reporttype') && $r->has('reporttarget') && $r->has('start_date') && $r->has('end_date')){
            $ids = $r->get('check_list');
            $input = $r->all();
            $dompdf = new PDF();
            $reporttype = $input['reporttype'];
            $reporttarget = ucfirst($input['reporttarget']);
            $table = 'bepc\Models\\'.$reporttarget;
            $start_date = $input['start_date'];
            $end_date = $input['end_date'];
           
            switch ($input['reporttype']) {
                case 'Withdraw':
                case 'Deposit':
                    $data =  $this->$input['reporttarget']->findAll($ids);
                    $log = [];
                    foreach ($data as $item) {
                        $log[$item->id] = \bepc\Models\InventoryLog::where('param_id', '=' ,$item['id'])
                        ->where('action' ,'=' , strtolower($input['reporttype']))
                        ->where('table' , '=' , $table)
                        ->whereDate('created_at' , '>=' , $start_date)
                        ->whereDate('created_at' , '<=' , $end_date)
                        ->get();
                    }
                    $pdf = PDF::loadView('self.blade.pdf.'.$input['reporttype'], compact('data' , 'log' ,'reporttype'));
                    return $pdf->stream();
                break;
                
                case 'Summary':
                

                break;
                case 'Delivery':

                break;
                case 'Purchase':

                break;
                case 'Inventory':
                    $data =  $this->$input['reporttarget']->findAll($ids);
                    $log = [];
                    foreach ($data as $item) {
                        $log[$item->id] =  \bepc\Models\InventoryLog::where('param_id' , '=' , $item['id'])
                        ->where('table' , '=' , $table)
                        ->whereDate('created_at' , '>=' , $start_date)
                        ->whereDate('created_at' , '<=' , $end_date)
                        ->get();
                    }
                   
                    $pdf = PDF::loadView('self.blade.pdf.'.$input['reporttype'], compact('data' ,'log' , 'reporttype'));
                    return $pdf->stream();


                break;
                
                default:

                break;
            }
        }
        else return redirect()->back()->withErrors('Missing input. Try again');
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
