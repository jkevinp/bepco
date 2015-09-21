<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Product;
use bepc\Ingredient;

class AjaxController extends Controller
{
    public function recipe(Request $r){
        if($r->has('product_id')){
            $p = Product::find($r->get('product_id'));
            $recipe = $p->recipe;
            $i = Ingredient::where('recipe_id' , '=' ,$recipe->first()->id)->get();

            return ['recipe' => $p->recipe , 'ingredient' => $i->lists('quantity','name')];
        }
    }
}
