<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\UserContract;
use bepc\Models\User;
use bepc\Models\UserBarcode;

use bepc\Models\UserIdCard;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use bcrypt;
class EloquentUserRepository implements UserContract
{

	public function find($id){
		return User::find($id);
	}
	public function store($param){
		$param['password'] = bcrypt($param['password']);
		return User::create($param);

	}
	public function sdelete(User $user){
		$user->delete();
	}
	public function fdelete(User $user){
		$user->forceDelete();
	}

	public function search($fields, $param){

	}
	public function all(){
		return User::all();
	}
} 