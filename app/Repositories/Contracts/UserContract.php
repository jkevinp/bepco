<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserBarcode;
interface UserContract{
	public function find($id);
	public function store($param);
	public function sdelete(User $user);
	public function fdelete(User $user);
	public function create_id(User $user ,UserBarcode $userbarcode);
	public function search($fields,$param);
	public function all();
}