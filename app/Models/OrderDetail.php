<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
 	protected $table='orderdetail';
 	public $incrementing = false;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'order_id',
								'product_id',
								'product_quantity'
							];
 	public function product(){
 		return $this->hasMany('bepc\Models\Product');
 	}

}