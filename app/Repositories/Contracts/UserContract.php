<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
interface UserContract{
	public function find($id);
	public function store($param);
	public function sdelete(User $user);
	public function fdelete(User $user);
	public function create_id(User $user);
	public function search($fields,$param);
}