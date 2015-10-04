<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
 	protected $table='userphoto'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	['id','user_id','filename','path'];
 	public function user(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	public function getImage(){
 		return $this->path.$this->filename;
 	}
}
