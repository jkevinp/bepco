<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['uses' => 'PageController@index' , 'as' => 'default.home']);
Route::get('/auth/login', ['uses' => 'AuthController@index' , 'as' => 'auth.login']);
Route::post('/auth/login', ['uses' => 'AuthController@signin' , 'as' => 'auth.login']);
Route::get('/auth/logout', ['uses' => 'AuthController@destroy' , 'as' => 'auth.logout']);

Route::group(['prefix' => 'user'] , function(){
	Route::get('/create/{type?}' , ['uses' => 'UserController@create' ,  'as' => 'user.create']);
	Route::get('/show/{id}/{name?}' , ['uses' => 'UserController@show' ,  'as' => 'user.show']);
	Route::post('/registration/' , ['uses' => 'UserController@store' ,  'as' => 'user.store']);
	Route::get('/list' , ['uses' => 'UserController@index'  , 'as' => 'user.list']);
	Route::get('/create-id/{userid}' , ['uses' => 'UserController@create_id'  , 'as' => 'user.id']);
	Route::get('/uploadphoto/{userid}' , ['uses' => 'UserController@uploadphoto'  , 'as' => 'user.upload.photo']);
	Route::post('/storephoto/' , ['uses' => 'UserController@storephoto'  , 'as' => 'user.store.photo']);
});

Route::group(['prefix' => 'user/barcode'],function(){
	Route::get('/create' , ['uses' => 'BarcodeController@create' , 'as' => 'barcode.create']);
	Route::get('/show/{id}' , ['uses' => 'BarcodeController@show' , 'as' => 'barcode.show']);
	Route::get('/list' , ['uses' => 'BarcodeController@index' , 'as' => 'barcode.list']);
	Route::get('/print' , ['uses' => 'BarcodeController@printbarcode' , 'as' => 'barcode.print']);
	Route::post('/store' , ['uses' => 'BarcodeController@store' , 'as' => 'barcode.store']);
});
Route::group(['prefix' => 'user/product'],function(){
	Route::get('/create' , ['uses' => 'ProductController@create' , 'as' => 'product.create']);
	Route::get('/show/{id?}' , ['uses' => 'ProductController@show' , 'as' => 'product.show']);
	Route::get('/list' , ['uses' => 'ProductController@index' , 'as' => 'product.list']);
	Route::get('/print' , ['uses' => 'ProductController@printbarcode' , 'as' => 'product.print']);
	Route::post('/store' , ['uses' => 'ProductController@store' , 'as' => 'product.store']);
	Route::post('/update' , ['uses' => 'ProductController@update' , 'as' => 'product.update']);
	Route::get('/compute/{orderid?}' , ['uses' => 'ProductController@compute' , 'as' => 'product.compute']);
	Route::get('/processcomputation' , ['uses' => 'ProductController@processcomputation' , 'as' => 'product.processcomputation']);
});
Route::group(['prefix' => 'user/recipe'],function(){
	Route::get('/create' , ['uses' => 'RecipeController@create' , 'as' => 'recipe.create']);
	Route::get('/show/{id}' , ['uses' => 'RecipeController@show' , 'as' => 'recipe.show']);
	Route::get('/list' , ['uses' => 'RecipeController@index' , 'as' => 'recipe.list']);
	Route::get('/print' , ['uses' => 'RecipeController@printbarcode' , 'as' => 'recipe.print']);
	Route::post('/store' , ['uses' => 'RecipeController@store' , 'as' => 'recipe.store']);
	Route::post('/update' , ['uses' => 'RecipeController@update' , 'as' => 'recipe.update']);
});
Route::group(['prefix' => 'user/ingredient'],function(){
	Route::get('/create' , ['uses' => 'IngredientController@create' , 'as' => 'ingredient.create']);
	Route::get('/show/{id}' , ['uses' => 'IngredientController@show' , 'as' => 'ingredient.show']);
	Route::get('/list' , ['uses' => 'IngredientController@index' , 'as' => 'ingredient.list']);
	Route::get('/print' , ['uses' => 'IngredientController@printbarcode' , 'as' => 'ingredient.print']);
	Route::post('/store' , ['uses' => 'IngredientController@store' , 'as' => 'ingredient.store']);
	Route::post('/update' , ['uses' => 'IngredientController@update' , 'as' => 'ingredient.update']);
});
Route::group(['prefix' => 'ajax'], function(){
	Route::get('/recipe' , ['uses' => 'AjaxController@recipe' , 'as' => 'ajax.recipe']);
	Route::get('/getUser' , ['uses' => 'AjaxController@getUser' , 'as' => 'ajax.get.user']);
	Route::get('/order' , ['uses' => 'AjaxController@order' , 'as' => 'ajax.get.order']);
	Route::get('/ordernumber' , ['uses' => 'AjaxController@ordernumber' , 'as' => 'ajax.get.ordernumber']);
	
});

Route::group(['prefix' => 'user/order'],function(){
	Route::get('/create' , ['uses' => 'OrderController@create' , 'as' => 'order.create']);
	Route::post('/save' , ['uses' => 'OrderController@save' , 'as' => 'order.ajaxstore']);
	Route::get('/index' , ['uses' => 'OrderController@index' , 'as' => 'order.list']);
});
Route::group(['prefix' => 'inventory/item'],function(){
	Route::get('/create' , ['uses' => 'ItemController@create' , 'as' => 'item.create']);
	Route::post('/store' , ['uses' => 'ItemController@store' , 'as' => 'item.store']);
	Route::get('/index' , ['uses' => 'ItemController@index' , 'as' => 'item.list']);
	Route::get('/withdraw/{id?}' , ['uses' => 'ItemController@withdraw' , 'as' => 'item.withdraw']);
	Route::get('/deposit/{id?}' , ['uses' => 'ItemController@deposit' , 'as' => 'item.deposit']);
	Route::post('/proccess-withdrawal/' , ['uses' => 'ItemController@proccessWithdrawal' , 'as' => 'item.process.withdraw']);
	Route::post('/proccess-deposit/' , ['uses' => 'ItemController@proccessDeposit' , 'as' => 'item.process.deposit']);

	
});