<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrivilege extends Model
{
 	protected $table='privilege'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	['name','action'];
 	public function usergroup(){
 		return $this->belongsTo('bepc\Models\UserGroup');
 	}
}
