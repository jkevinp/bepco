<?php namespace bepc\Repositories\Contracts;
use bepc\Models\Recipe;
interface RecipeContract{
	public function find($id);
	public function store($request);
	public function sdelete(Recipe $user);
	public function fdelete(Recipe $user);
	public function create_id(Recipe $user);
	public function search($fields,$param);
	public function all();
	public function getNullBarcode();
	public function getNullRecipe();
}