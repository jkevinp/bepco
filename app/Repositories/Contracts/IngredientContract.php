<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Ingredient;
interface IngredientContract{
	public function find($id);
	public function store($request);
	public function sdelete(Ingredient $user);
	public function fdelete(Ingredient $user);
	public function create_id(Ingredient $user);
	public function search($arrayParam);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
}