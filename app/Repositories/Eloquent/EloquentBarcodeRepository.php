<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\BarcodeContract;
use bepc\Models\Barcode;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
class EloquentBarcodeRepository implements BarcodeContract
{

	public function find($id){
		return Barcode::find($id);
	}
	public function store($param){

	}
	public function sdelete(Barcode $user){
		
	}
	public function fdelete(Barcode $user){
		
	}
	public function create_id(Barcode $user){

	}
	public function search($fields, $param){

	}
	public function all(){
		return Barcode::all();
	}
} 