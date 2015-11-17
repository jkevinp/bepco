<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
 	protected $table='inventorylog';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'proccess',
								'action',
								'user_id',
								'user_name',
								'message',
								'fired_at',
								'field',
								'param',
								'table',
								'param_id',
								'param_value',
								'start_quantity',
								'end_quantity'
							];


 

}