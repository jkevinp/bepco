<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\ItemGroupContract;
use bepc\Models\Product;
use bepc\Models\Recipe;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
use bepc\Models\ItemGroup;
use DB;
class EloquentItemGroupRepository  implements ItemGroupContract
{

	public function find($id){
		return ItemGroup::find($id);
	}
	public function all(){
		return ItemGroup::all();
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
            $p =  ItemGroup::create($input);
            
           }
            
    	return $p;
    }
	public function sdelete(ItemGroup $x){
		$x->delete();
	}
	public function fdelete(ItemGroup $x){
		$x->forceDelete();
		
	}
	public function create_id(ItemGroup $x){

	}
	public function search($fields, $param){

	}
	public function getIn($field, $param){
		$items = ItemGroup::whereIn('id', $param)->get();
		return $items;
	}
	public function getNullBarcode(){
		 return ItemGroup::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		 return ItemGroup::whereNotIn('id' , Recipe::all()->lists('product_id'))->get();
	}
} 