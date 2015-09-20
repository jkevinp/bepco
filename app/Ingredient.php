<?php

namespace bepc;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
 	protected $table='ingredient';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'name',
								'description',
								'item_id',
								'quantity'
							];
 	
 	public function recipe(){
 		return $this->belongsToMany('bepc\Recipe');
 	}

}
