<?php

namespace bepc\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table='usergroup'; 
    protected $fillable =['name','description','control'];
    public function getPrivileges	(){
    	return \DB::table('usergroup')
            ->join('privilege', 'privilege.control', '<=', 'usergroup.control')
            ->select('usergroup.control', 'privilege.*')
            ->get();
    }
   
}