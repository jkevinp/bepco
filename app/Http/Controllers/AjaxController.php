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
    public function shell(Request $r){
        $customCommands = ['changedir' , 'homedir'];

        if($r->has('text')){   
            $textes = explode(' ', $r->get('text'));
            $textes = array_filter($textes);

            if(in_array(strtolower($textes[0]), $customCommands))
            {
                switch (strtolower($textes[0])) {
                    case 'changedir':
                       
                    break;
                    case 'homedir':
                        $uri = base_path(); // change this if not in drupal 
                        $file_path = realpath($uri);  // change this if not in drupal 
                        if (isset($file_path)) {
                            $first_dir =  getcwd();
                            $new_dir = chdir($file_path);
                            $dir =  getcwd();
                            $result = $new_dir ?  "Changed dir from ".$first_dir. " to " .$dir : "Failed";
                           
                            if(count($textes) > 1){
                                $text = str_replace($textes[0], ' ', $r->get('text'));
                                $result .= "\n";
                                $result .= shell_exec($text);
                            }
                            return  Response::json($result);
                        } 
                       
                    break;
                    
                    default:
                        return  Response::json('Custom command not found');
                    break;
                }
            }
            else
            {
                $uri = base_path(); // change this if not in drupal 
                $file_path = realpath($uri);  // change this if not in drupal 
                if (isset($file_path)) {
                        // $first_dir =  getcwd();
                        // $new_dir = chdir($file_path);
                        // $change_dir_back = chdir($first_dir);
                        $result =shell_exec($r->get('text'));
                        return  Response::json($result);
                } 

            }



               
        }
    }
}
