<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserBarcode extends Model
{
 	protected $table='userbarcode'; 
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'barcodekey',
								'user_id',
								'filename',
								'path',
								'status'
							];
 	public function product(){
 		return $this->belongsTo('bepc\Models\User');
 	}
 	

}
