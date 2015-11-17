<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\IngredientContract;
use bepc\Models\Ingredient;
use bepc\Models\Recipe;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use bepc\Models\Item;
class EloquentIngredientRepository  implements IngredientContract
{

	public function find($id){
		return Ingredient::find($id);
	}
	public function all(){
		return Ingredient::all();
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
            $p =  Ingredient::create($input);
            
           }
            
    	return $p;
    }
	public function sdelete(Ingredient $user){
		
	}
	public function fdelete(Ingredient $user){
		
	}
	public function create_id(Ingredient $user){

	}
	public function search($arrayParam){
		return Ingredient::where($arrayParam)->get();
	}
	public function getNullBarcode(){
		 return Ingredient::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		 return Ingredient::whereNotIn('id' , Recipe::all()->lists('product_id'))->get();
	}
} 