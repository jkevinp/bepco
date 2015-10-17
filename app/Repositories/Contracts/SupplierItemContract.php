<?php namespace bepc\Repositories\Contracts;
use bepc\Models\SupplierItem;
interface SupplierItemContract{
	public function find($id);
	public function search($fields,$param);
	public function store($request);
	public function update(SupplierItem $supplieritem , $request);
	public function fdelete(SupplierItem $supplieritem);
	public function sdelete(SupplierItem $supplieritem);
	public function all();
	public function validateStore($request);
}