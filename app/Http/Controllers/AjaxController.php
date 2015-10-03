<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Product;
use bepc\Models\Ingredient;
use bepc\Repositories\Contracts\UserContract;
use Response;
class AjaxController extends Controller
{
	public function __construct(UserContract $uc){
		$this->user = $uc;
	}
    public function recipe(Request $r){
        if($r->has('product_id')){
            $p = Product::find($r->get('product_id'));
            $recipe = $p->recipe;
            $i = Ingredient::where('recipe_id' , '=' ,$recipe->first()->id)->get();

            return ['recipe' => $p->recipe , 'ingredient' => $i->lists('quantity','name')];
        }
    }
    public function getUser(Request $r){
    	if($r->Ajax()){

    		if($r->has('id')){
    			$user=  $this->user->find($r->get('id'));
    			if($user){return Response::json(['status' => 'success','result' => $user]);}
    			return Response::json(['status' => 'error']);
    		}
    		//error
    		return Response::json(['status' => 'error']);
    	}
    		return Response::json(['status' => 'error']);
    	//error
    }
}
