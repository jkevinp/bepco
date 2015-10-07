<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Item;

use bepc\Models\User;
interface ItemContract{
	public function find($id);
	public function store($request);
	public function sdelete(Item $user);
	public function fdelete(Item $user);
	public function create_id(Item $user);
	public function search($fields,$param);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
	public function getIn($field, $param);
	public function deduct(Item $item , User $user ,$quantity);
	public function induct(Item $item , User $user ,$quantity);
	public function update(Item $item,$request);
}