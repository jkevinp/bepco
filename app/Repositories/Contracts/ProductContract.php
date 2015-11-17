<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Product;
use bepc\Models\User;
interface ProductContract{
	public function find($id);
	public function findAll($ids);
	public function store($request);
	public function sdelete(Product $user);
	public function fdelete(Product $user);
	public function create_id(Product $user);
	public function search($paramArray);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
	public function getNullRecipeSearch($paramArray);
	public function deduct(Product $product ,User $user,  $quantity , $details);
	public function induct(Product $product ,User $user,  $quantity , $details);
}