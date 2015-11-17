<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\ProductContract;
use bepc\Models\Product;
use bepc\Models\Recipe;
use bepc\Models\User;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
use bepc\Libraries\Generic\Helper;
class EloquentProductRepository  implements ProductContract
{

	public function find($id){
		return Product::find($id);
	}
	public function all(){
		return Product::all();
	}
	public function findAll($ids){
		return Product::whereIn('id' , $ids)->get();
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
	public function sdelete(Product $product){
		$product->delete();
	}
	public function fdelete(Product $product){
		$product->forceDelete();
	}
	public function create_id(Product $user){

	}
	public function search($paramArray){
		return Product::where($paramArray)->get();
	}
	public function getNullBarcode(){
		 return Product::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		 return Product::whereNotIn('id' , Recipe::all()->lists('product_id'))->get();
	}
	public function getNullRecipeSearch($paramArray){
		 return Product::whereNotIn('id' , Recipe::all()->lists('product_id'))->where($paramArray)->get();
	}
	public function deduct(Product $item ,User $user,  $quantity , $details){
		$start_quantity = $item->quantity;
		if($item->quantity - $quantity < 0){
			return false;
		}
		else{
			$item->quantity = $item->quantity - $quantity;
			if($result = $item->save()){
					Helper::log('deduct', 'withdraw' , $user , 'EPR' , 'quantity' , $quantity , $item->id , $quantity , $start_quantity, $item->quantity, get_class($item),$details);
			}
			return $result;
		}
		return false;
	}
	public function induct(Product $item ,User $user,  $quantity , $details){
		$start_quantity = $item->quantity;
		$item->quantity = $item->quantity + $quantity;
		if($result= $item->save()){
			Helper::log('induct', 'deposit' , $user , 'EPR' , 'quantity' , $quantity , $item->id , $quantity , $start_quantity, $item->quantity, get_class($item),$details);
		}
		return $result;
	}
} 