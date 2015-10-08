<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
 	protected $table='useraddress'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'user_id',
								'street',
								'state',
								'city',
								'country',
								'region',
								'zippostal'
							];
 	public function user(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	

}
