<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserContact;
use bepc\Models\UserBarcode;
use bepc\Models\UserIdCard;
interface UserContactContract{
	public function find($id);
	public function store(User $user,$request);
	public function sdelete(UserContact $userbarcode);
	public function fdelete(UserContact $userbarcode);
	public function update(UserContact $usercontact ,$request);
	public function search($fields,$param);
	public function all();
	public function checkParams($input);
}