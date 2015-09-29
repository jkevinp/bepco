<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Product;
interface ProductContract{
	public function find($id);
	public function store($request);
	public function sdelete(Product $user);
	public function fdelete(Product $user);
	public function create_id(Product $user);
	public function search($fields,$param);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
}