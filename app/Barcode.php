<?php

namespace bepc;

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
 	public function ingredient(){
 		return $this->belongsTo('bepc\Product');
 	}
 	

}
