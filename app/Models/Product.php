<?php

namespace bepc\Models;
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
 	public function recipe(){
 		return $this->hasMany('bepc\Models\Recipe');
 	}
 	public function barcode(){
 		return $this->hasOne('bepc\Models\Barcode');
 	}

}
