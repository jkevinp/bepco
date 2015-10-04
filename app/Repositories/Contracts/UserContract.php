<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserBarcode;
use bepc\Models\UserPrivilege;
use bepc\Models\UserPhoto;
interface UserContract{
	public function find($id);
	public function store($param);
	public function sdelete(User $user);
	public function fdelete(User $user);
	public function generate_id();
	public function search($fields,$param);
	public function all();
	public function uploadphoto($file);
	public function getphoto(User $user);
}