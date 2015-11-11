<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class SupplierItem extends Model
{	
 	protected $table='supplieritem'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'item_id',
								'supplier_id',
								'status'
							];

	public static  $rule_store = [
		'item_id' => 'required|exists:item,id',
		'supplier_id' => 'required|exists:supplier,id',
		'status' => 'required'
	];
	public static function getRuleStore(){
		return Self::$rule_store;
	}
	public function supplier(){
		return $this->hasMany('bepc\Models\Supplier' , 'id'	, 'supplier_id');
	}
	public function item(){
		return $this->hasOne('bepc\Models\Item' , 'id', 'item_id');
	}
 
}
