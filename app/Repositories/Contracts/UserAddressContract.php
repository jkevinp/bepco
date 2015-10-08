<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserAddress;
interface UserAddressContract{
	public function find($id);
	public function store(User $user,$request);
	public function sdelete(UserAddress $useraddress);
	public function fdelete(UserAddress $useraddress);
	public function update(UserAddress $useraddress ,$request);
	public function search($fields,$param);
	public function all();
	public function checkParams($input);
}