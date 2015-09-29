<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Product;
use bepc\Models\Recipe;
use bepc\Models\Ingredient;
use bepc\Repositories\Contracts\ProductContract;

class RecipeController extends Controller
{
    function __construct(ProductContract $pc){
        $this->product = $pc;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe = Recipe::all();
        return view('self.blade.recipe.list')->with(compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->getNullRecipe()->lists('name', 'id');
        $items = Item::all();
        return view('self.blade.recipe.create')->with(compact('products' , 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate this
       $recipe = Recipe::create($request->all());
       if($recipe)return redirect()->back()->with('flash_message' , 'Recipe has been successfully saved.');
       return redirect()->back()->withErrors('Could not save recipe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
