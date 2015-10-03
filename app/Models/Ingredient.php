<?php

namespace bepc\Models;

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
								'quantity',
								'recipe_id'
							];
 	
 	public function recipe(){
 		return $this->belongsTo('bepc\Models\Recipe' , 'recipe_id' , 'id' );
 	}
 	public function item(){
 		return $this->hasOne('bepc\Models\Item' , 'id' ,'item_id');
 	}

}
