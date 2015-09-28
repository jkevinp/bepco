<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\UserContract;
use bepc\Models\User;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
class EloquentUserRepository implements UserContract
{

	public function find($id){
		return User::find($id);
	}
	public function store($param){

	}
	public function sdelete(User $user){
		
	}
	public function fdelete(User $user){
		
	}
	public function create_id(User $user){

	}
	public function search($fields, $param){

	}
} 