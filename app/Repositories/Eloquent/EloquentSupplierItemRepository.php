<?php namespace bepc\Repositories\Eloquent;
use bepc\Models\SupplierItem;
use Validator;
use bepc\Repositories\Contracts\SupplierItemContract;
class EloquentSupplierItemRepository implements SupplierItemContract{
	public function find($id){
		return SupplierItem::find($id);
	}
	public function search($fields,$param){

	}
	public function store($request){
		return SupplierItem::create($request->all());
	}
	public function update(SupplierItem $supplieritem , $request){

	}
	public function fdelete(SupplierItem $supplieritem){
		return $supplieritem->forceDelete();
	}
	public function sdelete(SupplierItem $supplieritem){
		return $supplieritem->delete();
	}
	public function all(){
		return SupplierItem::all();
	}
	public function validateStore($request){
		$v = Validator::make($request->all() , SupplierItem::$rule_store);
		return $v;
	}
}