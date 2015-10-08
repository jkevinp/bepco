<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
 	protected $table='usercontact'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'user_id',
								'phone',
								'mobile',
								'facebook',
								'additionalemail'
							];
 	public function user(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	

}
