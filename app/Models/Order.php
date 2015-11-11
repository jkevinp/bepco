<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
 	protected $table='order';
 	public $incrementing = false;
 	protected $dates = [ 'created_at' , 'updated_at' , 'deleted_at'];
	protected $fillable = 	[
								'id',
								'deliverydate',
								'description',
								'status',
								'customer_id',
								'creator_id'
							];
	protected $showables= [
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
	public function customer(){
		return $this->belongsTo('bepc\Models\Customer' ,'customer_id');	
	}
	public function getShowables(){
		return $this->showables;
	}
	public static function getNotification(){
		return Self::where('status' , '!=' , 'fulfilled')->get(); 
	}
 	
}