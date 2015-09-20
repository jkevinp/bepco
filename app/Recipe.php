<?php

namespace bepc;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table='recipe'; 
	protected $fillable = 	[
								'name',
								'price',
								'ingredient_id',
								'product_id',
                                'ingredient_quantity'
							];
 	
    public function ingredient(){
    	return $this->hasMany('bepc\Ingredient');
    }
    public function product(){
    	return $this->belongsTo('bepc\Product');
    }
}
