<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Supplier;
interface SupplierContract{
	public function find($id);
	public function store($request);
	public function sdelete(Supplier $user);
	public function fdelete(Supplier $user);
	public function search($fields,$param);
	public function all();
	public function generate_id();
	public function validateStore($request);
}