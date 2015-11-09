<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Customer;
use bepc\Models\UserBarcode;
use bepc\Models\UserPrivilege;
use bepc\Models\UserPhoto;
interface CustomerContract{
	public function find($id);
	public function store($param);
	public function sdelete(Customer $user);
	public function fdelete(Customer $user);
	public function generate_id();
	public function search($searchParameter);
	public function all();
	public function uploadphoto($file);
	public function generate_barcode(Customer $user);
	public function getphoto(Customer $user);
	public function changeStatus(Customer $user);
	public function updatePassword(Customer $user ,$newPassword);
	public function validateStore($param);
}