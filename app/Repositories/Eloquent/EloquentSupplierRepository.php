<?php namespace bepc\Repositories\Eloquent;
use bepc\Models\Supplier;
use bepc\Repositories\Contracts\SupplierContract;
use Validator;
use bepc\Libraries\Generic\Helper;
class EloquentSupplierRepository implements SupplierContract{
	public function find($id){
		return Supplier::find($id);
	}
	public function store($request){
		$param = $request->all();
		$param['id'] = $this->generate_id();
		return Supplier::create($param);
	}
	public function validateStore($request){
		$v = Validator::make($request->all(), Supplier::getRuleStore());
		return $v;
	}
	public function generate_id(){
		return Helper::generate_id('SUP',  str_random(3));
	}
	public function sdelete(Supplier $user){
		return $supplier->delete();
	}
	public function fdelete(Supplier $user){
		return $supplier->forceDelete();
	}
	public function search($fields,$param){
		
	}
	public function all(){
		return Supplier::all();
	}
}