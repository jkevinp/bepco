<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 	protected $table='order';
 	public $incrementing = false;
 	protected $dates = [ 'created_at' , 'updated_at' , ];
	protected $fillable = 	[
								'id',
								'deliverydate',
								'description',
								'status',
								'customer_id',
								'creator_id'
							];

	public function orderdetail(){
		return $this->hasMany('bepc\Models\OrderDetail');	
	}
 	
}