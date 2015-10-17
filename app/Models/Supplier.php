<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
 	protected $table='supplier'; 
 	public $incrementing = false;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'name',
								'description',
								'status'
							];

	public static  $rule_store = [
	
		'name' => 'required',
		'status' => 'required'
	];
	public static function getRuleStore(){
		return Self::$rule_store;
	}
	public function supplieritem(){
		return $this->hasMany('bepc\Models\SupplierItem');
	}
 
}
