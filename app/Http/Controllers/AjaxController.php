<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Product;
use bepc\Models\OrderDetail;

use bepc\Models\Ingredient;
use bepc\Repositories\Contracts\UserContract;
use Response;
use DB;
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
    public function order(Request $r){
        return DB::table('orderdetail')
                ->join('product', 'orderdetail.product_id' , '=' , 'product.id')
                ->select(DB::raw('sum(orderdetail.product_quantity) as product_count , product.name'))
                ->groupBy('product.name')
                ->get();
    }
    public function ordernumber(Request $r){
        return DB::table('order')
        ->select(DB::raw('created_at , count(*) as order_count'))
        ->groupBy('created_at')
        ->get();
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
