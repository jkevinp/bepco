<?php namespace bepc\Repositories\Contracts;
use bepc\Models\InventoryLog;
interface InventoryLogContract{
	public function find($id);
	public function store($request);
	public function sdelete(InventoryLog $user);
	public function fdelete(InventoryLog $user);
	public function search($fields,$param);
	public function all();
}