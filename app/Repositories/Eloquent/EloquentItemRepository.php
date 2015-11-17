<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\ItemContract;
use bepc\Models\Product;
use bepc\Models\Recipe;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use URL;
use bepc\Models\Item;
use DB;
use bepc\Models\User;
use bepc\Libraries\Generic\Helper;

class EloquentItemRepository  implements ItemContract
{

	public function find($id){
		return Item::find($id);
	}
	public function all(){
		return Item::all();
	}
	public function store($request){
		$input = $request->all();
		//validate

		return Item::create($input);

		// $input = $request->all();
		// $image = $request->file('file');
  //       if(strpos($image->getClientMimeType(),'image') !== FALSE){
  //           $upload_folder ='img-product/';
  //           $file_name = str_random(). '.' . $image->getClientOriginalExtension();
  //           $image->move(public_path($upload_folder).'/', $file_name);
  //           echo URL::asset($upload_folder . $file_name);  // get upload file url
  //           $input['imageurl'] = $upload_folder.$file_name;
  //           $p =  Item::create($input);
            
  //          }
            
  //   	return $p;
    }
	public function sdelete(Item $user){
		
	}
	public function fdelete(Item $user){
		
	}
	public function create_id(Item $user){

	}
	public function findAll($ids){
		return Item::whereIn('id' , $ids)->get();
	}
	public function search($fields, $param){

	}
	public function update(Item $item, $r){
		if($item && $r){
			//validation
			$item->name = $r->get('name');
			$item->itemgroup_id = $r->get('itemgroup_id');
			$item->description = $r->get('details');
			$item->quantity = $r->get('quantity');
			return $item->save();

		}
	}


	public function getIn($field, $param){
		$items = Item::whereIn('id', $param)->get();
		return $items;
	}
	public function getNullBarcode(){
		 return Item::whereNull('barcode_id')->orWhere('barcode_id' , '=' ,'')->get();
	}
	public function getNullRecipe(){
		 return Item::whereNotIn('id' , Recipe::all()->lists('product_id'))->get();
	}
	public function deduct(Item $item ,User $user,  $quantity , $details){
				$start_quantity = $item->quantity;
		if($item->quantity - $quantity < 0){
			return false;
		}
		else{
			$item->quantity = $item->quantity - $quantity;
			if($result = $item->save()){
					Helper::log('deduct', 'withdraw' , $user , 'EIR' , 'quantity' , $quantity , $item->id , $quantity , $start_quantity, $item->quantity, get_class($item),$details);
			}
			return $result;
		}
		return false;

		//process save record withdraw here
	}
	//$processname , $action, User $user , $fired_at , $field , $param , $param_id ,$param_value , $start_quantity ,$end_quantity

	public function induct(Item $item ,User $user,  $quantity , $details){
		$start_quantity = $item->quantity;
		$item->quantity = $item->quantity + $quantity;
		if($result= $item->save()){
			Helper::log('induct', 'deposit' , $user , 'EIR' , 'quantity' , $quantity , $item->id , $quantity , $start_quantity, $item->quantity, get_class($item),$details);
		}
		return $result;

		//process save record withdraw here
	}
} 