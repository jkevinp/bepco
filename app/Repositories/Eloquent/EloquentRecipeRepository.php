<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\RecipeContract;
use bepc\Models\Recipe;

class EloquentRecipeRepository  implements RecipeContract
{

	public function find($id){
		return Recipe::find($id);
	}
	public function all(){
		return Recipe::all();
	}
	public function store($request){
		
    }
	public function sdelete(Recipe $r){
		$r->forceDelete();
	}
	public function fdelete(Recipe $user){
		
	}
	public function create_id(Recipe $user){

	}
	public function search($fields, $param){

	}
	public function getNullBarcode(){
	//	 return Recipe::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		
	}
} 