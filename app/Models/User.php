<?php

namespace bepc\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract{
    use Authenticatable, Authorizable, CanResetPassword,SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname' , 'lastname', 'middlename', 'usergroup_id', 'email', 'password' , 'username' ,'barcode_id' ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getName(){
        return $this->firstname. " ".$this->middlename." ".$this->lastname;
    }
    public function getUserGroupName(){
        return $this->usergroup->name;
    }
    public function usergroup(){
        return $this->hasOne('bepc\Models\UserGroup' , 'id' , 'usergroup_id');
    }
    public function userbarcode(){
        return $this->hasOne('bepc\Models\UserBarcode');
    }
    public function useridcard(){
        return $this->hasOne('bepc\Models\UserIdCard');
    }
}
