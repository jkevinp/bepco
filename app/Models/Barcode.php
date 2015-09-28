<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
 	protected $table='barcode'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'barcodekey',
								'product_id',
								'imageurl'
							];
 	public function product(){
 		return $this->belongsTo('bepc\Models\Product');
 	}
 	

}
