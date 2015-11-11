<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
 	protected $table='item';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'name',
								'alert_quantity',
								'safe_quantity',
								'imageurl',
								'supplier_id',
								'quantity',
								'itemgroup_id'
							];
 	public function ingredient(){
 		return $this->hasMany('bepc\Models\Ingredient');
 	}
 	public function recipe(){
 		return $this->hasMany('bepc\Models\Recipe');
 	}
 	public function barcode(){
 		return $this->hasOne('bepc\Models\Barcode');
 	}
 	public function itemgroup(){
 		return $this->belongsTo('bepc\Models\ItemGroup');
 	}
 	public function supplier(){
 		return $this->hasMany('bepc\Models\SupplierItem');
 	}

}