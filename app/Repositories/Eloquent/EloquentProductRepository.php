<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\ProductContract;
use bepc\Models\Product;
use bepc\Models\Recipe;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
class EloquentProductRepository  implements ProductContract
{

	public function find($id){
		return Product::find($id);
	}
	public function all(){
		return Product::all();
	}
	public function store($request){
		$input = $request->all();
		$image = $request->file('file');
        if(strpos($image->getClientMimeType(),'image') !== FALSE){
            $upload_folder ='img-product/';
            $file_name = str_random(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path($upload_folder).'/', $file_name);
            echo URL::asset($upload_folder . $file_name);  // get upload file url
            $input['imageurl'] = $upload_folder.$file_name;
            $p =  Product::create($input);
            
           }
            
    	return $p;
    }
	public function sdelete(Product $user){
		
	}
	public function fdelete(Product $user){
		
	}
	public function create_id(Product $user){

	}
	public function search($fields, $param){

	}
	public function getNullBarcode(){
		 return Product::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		 return Product::whereNotIn('id' , Recipe::all()->lists('product_id'))->get();
	}
} 