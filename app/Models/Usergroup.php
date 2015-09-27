<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model
{
    protected $table='usergroup'; 
    protected $fillable =   [

                                'name',
                                'description',
                                'control'
                            ];
   
}
