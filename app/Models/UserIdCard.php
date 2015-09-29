<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserIdCard extends Model
{
 	protected $table='useridcard'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	['id','user_id','filename','path','status'];
 	public function user(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	public function getImage(){
 		return $this->path.$this->filename;
 	}
 	

}
