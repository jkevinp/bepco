<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
 	protected $table='itemgroup';
 	public $incrementing = true;
 	protected $dates = [ 'created_at' , 'updated_at'];
	protected $fillable = 	[
								'id',
								'name',
								'description',
								'formula'
							];
 

}