<?php namespace bepc\Http\Controllers;
use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;

use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
use Storage;
use File;
use PDF;
use bepc\Models\Product;
use bepc\Models\Barcode;

use bepc\Repositories\Contracts\BarcodeContract;
use bepc\Repositories\Contracts\ProductContract;
class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(BgcOutput $b ,BarcodeContract $bc,ProductContract $pc){
        $this->BgcOutput = $b;
        $this->barcode = $bc;
        $this->product = $pc;
    }

    public function index(){
        $files = $this->barcode->all();
        return view('self.blade.barcode.list')->withFiles($files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        $products = $this->product->getNullBarcode()->lists('name', 'id');
        if(count($products) > 0)
        return view('self.blade.barcode.create')->with(compact('products'));
        return redirect(route('barcode.list'))->withErrors('No more products to assign barcode.');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $extension = "png";
        $product = Product::find($input['product_id']);
        if($product){
            $file = $this->BgcOutput->output($request->get('barcodekey') ? $request->get('barcodekey') :  str_pad($input['product_id'], 7, "0", STR_PAD_LEFT) ,  $extension , public_path('img-barcode')); 
        //if($request->has('fastinput'))return redirect()->back()->with('flash_message' ,  'Successfully saved barcode. <br/>File:<a href="'.$file.'">View</a>');
            if(file_exists(public_path('img-barcode').'/'.$file)){
                $input['imageurl'] = Url('img-barcode').'/'.$file;
                $input['barcodekey'] = $request->get('barcodekey') ?str_pad( $request->get('barcodekey'), 7, "0", STR_PAD_LEFT)  :  str_pad($input['product_id'], 7, "0", STR_PAD_LEFT) ;
                if($barcode = $this->save($input)){
                    $product->barcode_id = $barcode->id;
                    if($product->save()){
                        return redirect(route('barcode.show' , $file ))->with('flash_message' ,  'Successfully saved barcode. <br/>File:<a href="'.$file.'">View</a>');
                    }
                }
            }

        }
      
        return redirect()->back()->withErrors('Cannot save barcode. Try Again');
    }
    public function save($input){
        //
        // $barcode = Barcode::find($input['id']);
        if($barcode = Barcode::where('product_id' , '=', $input['product_id'])->first())
        {
            $barcode->imageurl = $input['imageurl'];
            $barcode->barcodekey = $input['barcodekey'];
            $barcode->save();
        }else{
            $barcode =Barcode::create($input);
        }
        return $barcode;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('self.blade.barcode.show')->withFile($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function printbarcode()
    {
        $files = File::allFiles(public_path('img-barcode'));
        $param['files'] = $files;
        $param['count'] = 10;
        // echo "<pre>";
        // die(print_r($param));
        // echo "</pre>";
    // $view = view('pdf.print')->with(compact('files'));
      //  return $view;
        $pdf = PDF::loadView('pdf.print' , $param );
        return $pdf->stream();
    }
}
