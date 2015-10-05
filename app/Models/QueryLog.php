<?php

namespace bepc\Models;
use Illuminate\Database\Eloquent\Model;

class QueryLog extends Model
{
 	protected $table='querylog';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'sql',
								'user_id'
							];
 	

}
