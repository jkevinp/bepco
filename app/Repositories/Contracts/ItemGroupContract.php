<?php namespace bepc\Repositories\Contracts;
use bepc\Models\ItemGroup;
interface ItemGroupContract{
	public function find($id);
	public function store($request);
	public function sdelete(ItemGroup $itemGroup);
	public function fdelete(ItemGroup $itemGroup);
	public function create_id(ItemGroup $itemGroup);
	public function search($fields,$param);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
	public function getIn($field, $param);
}