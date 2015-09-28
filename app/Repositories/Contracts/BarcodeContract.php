<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Barcode;
interface BarcodeContract{
	public function find($id);
	public function store($param);
	public function sdelete(Barcode $user);
	public function fdelete(Barcode $user);
	public function create_id(Barcode $user);
	public function search($fields,$param);
	public function all();
}