<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
 	protected $table='privilege'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	['name','action' , 'control'];
 	public function usergroup(){
 		return $this->belongsTo('bepc\Models\UserGroup');
 	}
}
