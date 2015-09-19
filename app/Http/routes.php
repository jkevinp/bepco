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
Route::group(['prefix' => 'barcode'],function(){
	Route::get('/create' , ['uses' => 'BarcodeController@create' , 'as' => 'barcode.create']);
});