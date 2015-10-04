<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserPrivilege extends Model
{
 	protected $table='userprivilege'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	['user_id','privilege_id'];
 	public function user(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	public function getImage(){
 		return $this->path.$this->filename;
 	}
}
