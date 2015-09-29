<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table='usergroup'; 
    protected $fillable =['name','description','control'];
   
}