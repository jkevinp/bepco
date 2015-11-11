<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;

use bepc\Models\Recipe;
use bepc\Models\Ingredient;
use bepc\Repositories\Contracts\ProductContract;
use bepc\Repositories\Contracts\RecipeContract;
use bepc\Repositories\Contracts\ItemContract;

class RecipeController extends Controller
{
    function __construct(ProductContract $pc , RecipeContract $rc, ItemContract $ic){
        $this->product = $pc;
        $this->recipe = $rc;
        $this->item = $ic;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipe = $this->recipe->all();
        return view('self.blade.recipe.list')->with(compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($recipe= false)
    {

        if(!$recipe){
            $products = $this->product->getNullRecipe()->lists('name', 'id');
        }
        else{
            $products = $this->product->getNullRecipeSearch(['id' => $recipe])->lists('name' , 'id');
         
        } 

        $items = $this->item->all();
        if(count($products) && count($items))
        return view('self.blade.recipe.create')->with(compact('products' , 'items'));
        return redirect()->back()->withErrors("No available product or items");
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
        var_dump($request->all());
        $input = $request->all();
        $params = [];
        $quantities = $input['quantities'] = explode(',', $input['quantities']);
        $items= $this->item->getIn('id',  explode(',', $input['ids']));
        $ctr = 0;
        $recipe = Recipe::create($request->all());
      
        foreach ($items as $key => $value) {
            $ing = [
                        'name' => $value['name'] ." for ".$recipe->name,
                        'recipe_id' => $recipe->id,
                        'item_id' => $value['id'],
                        'quantity' => (int)$quantities[$ctr]
                    ];
           
            array_push($params, $ing);
            $ctr++;
        }
        $ingredients = Ingredient::insert($params);

       if($recipe && $ingredients)return redirect()->back()->with('flash_message' , 'Recipe has been successfully saved.');
       $this->recipe->fdelete($recipe);
       foreach ($ingredients as $key) {
           $key->forceDelete();
       }
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
