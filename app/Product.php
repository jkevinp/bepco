<?php

namespace bepc;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	protected $table='product';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'name',
								'price',
								'alert_quantity',
								'imageurl'
							];
 	public function ingredient(){
 		return $this->hasMany('bepc\Ingredient');
 	}
 	public function recipe(){
 		return $this->hasMany('bepc\Recipe');
 	}
 	public function barcode(){
 		return $this->hasOne('bepc\Barcode');
 	}

}
