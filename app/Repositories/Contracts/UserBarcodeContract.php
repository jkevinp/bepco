<?php namespace bepc\Repositories\Contracts;
use bepc\Models\User;
use bepc\Models\UserBarcode;
interface UserBarcodeContract{
	public function find($id);
	public function store(User $user,$file);
	public function sdelete(UserBarcode $userbarcode);
	public function fdelete(UserBarcode $userbarcode);
	public function create_id(User $user);
	public function search($fields,$param);
	public function all();
}