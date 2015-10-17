<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserBarcode;
use bepc\Models\UserIdCard;
interface UserIdCardContract{
	public function find($id);
	public function store(User $user,$file);
	public function update(User $user,$file);
	public function sdelete(UserIdCard $userbarcode);
	public function fdelete(UserIdCard $userbarcode);
	public function create_id(User $user ,UserBarcode $userbarcode);
	public function search($fields,$param);
	public function all();
}