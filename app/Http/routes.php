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
Route::get('/auth/forgotpassword' , ['uses' => 'AuthController@forgotPassword' , 'as' => 'auth.forgotpassword']);
Route::post('/auth/resetpassword' , ['uses' => 'AuthController@resetPassword' , 'as' => 'auth.resetpassword']);
Route::post('/auth/recover' , ['uses' => 'AuthController@updatePassword' , 'as' => 'auth.recover']);

Route::group(['prefix' => 'user'] , function(){
	Route::get('/create/{type?}' , ['uses' => 'UserController@create' ,  'as' => 'user.create']);
	Route::get('/forgotpassword' , ['uses' => 'UserController@forgotPassword' , 'as' => 'user.forgotpassword']);
	Route::post('/resetpassword' , ['uses' => 'UserController@resetPassword' , 'as' => 'user.resetpassword']);
	Route::post('/recover' , ['uses' => 'UserController@updatePassword' , 'as' => 'user.recover']);
	
	Route::get('/show/{id}/{name?}' , ['uses' => 'UserController@show' ,  'as' => 'user.show']);
	Route::post('/registration/' , ['uses' => 'UserController@store' ,  'as' => 'user.store']);
	Route::post('/update' , ['uses' => 'UserController@update' ,  'as' => 'user.update']);

	Route::get('/list' , ['uses' => 'UserController@index'  , 'as' => 'user.list']);
	Route::get('/create-id/{userid}' , ['uses' => 'UserController@create_id'  , 'as' => 'user.id']);
	Route::get('/update-id/{userid}' , ['uses' => 'UserController@update_id'  , 'as' => 'user.id.update']);

	Route::get('/uploadphoto/{userid}' , ['uses' => 'UserController@uploadphoto' , 'as' => 'user.upload.photo']);
	Route::post('/updatephoto/' ,         ['uses' => 'UserController@updatephoto' , 'as' => 'user.update.photo']);
	Route::post('/storephoto/' , 		 ['uses' => 'UserController@storephoto'  , 'as' => 'user.store.photo' ]);

	Route::get('/add-contact/{userid}', ['uses' => 'UserController@addContact' , 'as' => 'user.contact.create']);
	Route::get('/edit-contact/{contactid}', ['uses' => 'UserController@editContact' , 'as' => 'user.contact.edit']);
	Route::post('/update-contact/', ['uses' => 'UserController@updateContact' , 'as' => 'user.contact.update']);
	Route::post('/store-contact/', ['uses' => 'UserController@storeContact' , 'as' => 'user.contact.store']);
	Route::get('/delete-contact/{contactid}' , ['uses' => 'UserController@destroyContact' , 'as' => 'user.contact.delete']);

	Route::get('/add-address/{userid}', ['uses' => 'UserController@addAddress' , 'as' => 'user.address.create']);
	Route::get('/edit-address/{contactid}', ['uses' => 'UserController@editAddress' , 'as' => 'user.address.edit']);
	Route::post('/update-address/', ['uses' => 'UserController@updateAddress' , 'as' => 'user.address.update']);
	Route::post('/store-address/', ['uses' => 'UserController@storeAddress' , 'as' => 'user.address.store']);
	Route::get('/delete-address/{useraddressid}' , ['uses' => 'UserController@destroyAddress' , 'as' => 'user.address.delete']);

	Route::get('/changeStatus/{id}' ,['uses'=> 'UserController@changeStatus' , 'as' => 'user.changeStatus']);
	Route::get('/delete/{id}' ,['uses'=> 'UserController@delete' , 'as' => 'user.delete']);


	Route::get('/backup/', ['uses' => 'PageController@backup' , 'as' => 'site.backup']);
	Route::get('/download/', ['uses' => 'PageController@download' , 'as' => 'site.download']);
	Route::get('/download-file/{name}', ['uses' => 'PageController@getDownload' , 'as' => 'site.download.file']);
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

	Route::get('/withdraw/{id?}' , ['uses' => 'ProductController@withdraw' , 'as' => 'product.withdraw']);
	Route::get('/reorder/{id}/{auto?}' , ['uses' => 'ProductController@reorder' , 'as' => 'product.reorder']);
	Route::post('/setReorder' , ['uses' => 'ProductController@SetReOrder' , 'as' => 'product.setReorder']);
	Route::get('/deposit/{id?}' , ['uses' => 'ProductController@deposit' , 'as' => 'product.deposit']);
	Route::post('/proccess-withdrawal/' , ['uses' => 'ProductController@proccessWithdrawal' , 'as' => 'product.process.withdraw']);
	Route::post('/proccess-deposit/' , ['uses' => 'ProductController@proccessDeposit' , 'as' => 'product.process.deposit']);

});
Route::group(['prefix' => 'user/recipe'],function(){
	Route::get('/create/{id?}' , ['uses' => 'RecipeController@create' , 'as' => 'recipe.create']);
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

Route::group(['prefix' => 'reports'] , function(){
	Route::post('/generate' , ['uses' => 'ReportController@generate' , 'as' => 'report.generate']);
});

Route::group(['prefix' => 'ajax'], function(){
	
	Route::get('/recipe' , ['uses' => 'AjaxController@recipe' , 'as' => 'ajax.recipe']);
	Route::get('/getrecipe' , ['uses' => 'AjaxController@getRecipe' , 'as' => 'ajax.get.recipe']);
	Route::get('/getUser' , ['uses' => 'AjaxController@getUser' , 'as' => 'ajax.get.user']);
	Route::get('/order' , ['uses' => 'AjaxController@order' , 'as' => 'ajax.get.order']);
	Route::get('/ordernumber' , ['uses' => 'AjaxController@ordernumber' , 'as' => 'ajax.get.ordernumber']);
	Route::get('/command-prompt' , ['uses' => 'AjaxController@shell' , 'as' => 'cpanel.shell.cmd']);
	Route::get('/report/withdrawals' , ['uses' => 'AjaxController@getWithdrawals' , 'as' => 'ajax.report.get.withdrawals']);
});

Route::group(['prefix' => 'user/order'],function(){
	Route::get('/create' , ['uses' => 'OrderController@create' , 'as' => 'order.create']);
	Route::post('/save' , ['uses' => 'OrderController@save' , 'as' => 'order.ajaxstore']);
	Route::get('/index' , ['uses' => 'OrderController@index' , 'as' => 'order.list']);
	Route::get('/generate' , ['uses' => 'OrderController@generateOrder' , 'as' => 'order.generate']);
	Route::post('/generate2' , ['uses' => 'OrderController@selectOrders' , 'as' => 'order.generate2']);
	Route::post('/placeorder' , ['uses' => 'OrderController@placeOrder' , 'as' => 'order.place']);
});
Route::group(['prefix' => 'inventory/item'],function(){
	Route::get('/create' , ['uses' => 'ItemController@create' , 'as' => 'item.create']);
	Route::get('/edit/{id}/{name?}' , ['uses' => 'ItemController@edit' , 'as' => 'item.edit']);
	Route::post('/store' , ['uses' => 'ItemController@store' , 'as' => 'item.store']);
	Route::post('/update/{id}' , ['uses' => 'ItemController@update' , 'as' => 'item.update']);
	Route::get('/index' , ['uses' => 'ItemController@index' , 'as' => 'item.list']);

	Route::get('/withdraw/{id?}' , ['uses' => 'ItemController@withdraw' , 'as' => 'item.withdraw']);
	Route::get('/reorder/{id}/{auto?}' , ['uses' => 'ItemController@reorder' , 'as' => 'item.reorder']);
	Route::post('/setReorder' , ['uses' => 'ItemController@SetReOrder' , 'as' => 'item.setReorder']);
	Route::get('/deposit/{id?}' , ['uses' => 'ItemController@deposit' , 'as' => 'item.deposit']);
	Route::post('/proccess-withdrawal/' , ['uses' => 'ItemController@proccessWithdrawal' , 'as' => 'item.process.withdraw']);
	Route::post('/proccess-deposit/' , ['uses' => 'ItemController@proccessDeposit' , 'as' => 'item.process.deposit']);
});

Route::group(['prefix' => 'user/controlpanel'] , function(){
	Route::get('/index' , ['uses' => 'ControlPanelController@index' , 'as' => 'cpanel.index']);
	Route::get('/pull' , ['uses' => 'ControlPanelController@pull' , 'as' => 'cpanel.git.pull']);
	Route::get('/command-prompt' , ['uses' => 'ControlPanelController@commandprompt' , 'as' => 'cpanel.git.cmd']);
});
Route::group(['prefix' => 'user/setting'] , function(){
	Route::get('set/{id}/{value}' , ['uses' => 'SettingController@change' , 'as' => 'setting.change']);
});

Route::group(['prefix' => 'user/supplier'] , function(){
	Route::get('/list' , ['uses' => 'SupplierController@index' , 'as' => 'supplier.list']);
	Route::get('/create' , ['uses' => 'SupplierController@create' , 'as' => 'supplier.create']);
	Route::post('/store' , ['uses' => 'SupplierController@store' , 'as' => 'supplier.store']);
	Route::get('/edit/{id}' , ['uses' => 'SupplierController@edit' , 'as' => 'supplier.edit']);
	Route::post ('/update' , ['uses' => 'SupplierController@update' , 'as' => 'supplier.update']);

});

Route::group(['prefix' => 'user/supplieritem'] , function(){
	Route::get('/list' , ['uses' => 'SupplierItemController@index' , 'as' => 'supplieritem.list']);
	Route::get('/create' , ['uses' => 'SupplierItemController@create' , 'as' => 'supplieritem.create']);
	Route::post('/store' , ['uses' => 'SupplierItemController@store' , 'as' => 'supplieritem.store']);
	Route::get('/edit/{id}' , ['uses' => 'SupplierItemController@edit' , 'as' => 'supplieritem.edit']);
	Route::post ('/update' , ['uses' => 'SupplierItemController@update' , 'as' => 'supplieritem.update']);
});