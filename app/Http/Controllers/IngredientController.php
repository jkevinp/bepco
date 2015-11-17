<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use bepc\Models\Ingredient;

use bepc\Repositories\Contracts\IngredientContract;
use bepc\Repositories\Contracts\ItemContract;
use bepc\Repositories\Contracts\RecipeContract;
class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(IngredientContract $ic , ItemContract $item, RecipeContract $rc){
        $this->recipe = $rc;
        $this->ingredient = $ic;
        $this->item = $item;
    }

    public function index()
    {
        $ingredients = $this->ingredient->all();
        return view('self.blade.ingredient.list')->with(compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items =  $this->item->all()->lists('name' , 'id');
        $recipes =$this->recipe->all()->lists('name','id');
        return view('self.blade.ingredient.create')->with(compact('items' ,'recipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
