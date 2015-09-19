<?php namespace bepc\Http\Controllers;
use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;

use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct(BgcOutput $b){
        $this->BgcOutput = $b;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $dir = public_path().'\\img-barcode\\';
        $file = $this->BgcOutput->output('kevinpogi.png' , $dir);
        if(file_exists($dir.$file)){
            // return redirect()->back()->with(
            //     'flash_message' , 
            //     'Successfully saved barcode. <br/>File:<a href="'.$dir.$file.'">View</a>'
            // );
            echo "<img src='".URL::asset('public/img-barcode').'/'.$file."' />";
        }
       // return redirect()->back()->withErrors('Cannot save barcode! \nArgs:'.$dir.$file );
       // file_put_contents(public_path().'/img-barcode/code'.$filename.'.png', $html);
        //$html = file_get_contents($this->BgcOutput->output('test'));
        //$doc = new DOMDocument();
        //@$doc->loadHTML($html);

        //$tags = $doc->getElementsByTagName('img');
        //foreach ($tags as $tag) {
          //     $t=  $tag->getAttribute('src');
        //  }
        //file_put_contents(public_path().'code'.$filename.'.png', $html);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
}
