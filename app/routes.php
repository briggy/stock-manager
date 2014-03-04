<?php


Route::controller('auth', 'AuthController');
Route::get('login', array('as'=>'login', 'uses'=>'Admin@login'));
Route::controller('web', 'WebController');

// Filters
Route::group(array('before'=>'auth'), function(){

	Route::get('products/com', ['uses'=>'ProductsController@com']);
	
	Route::resource('sales', 'SalesController');
	Route::resource('purchases', 'PurchasesController');
	Route::resource('suppliers', 'SuppliersController');
	Route::resource('categs', 'CategsController');
	Route::resource('products', 'ProductsController');
	Route::controller('reports', 'ReportsController');

	Route::controller('/', 'Admin');


});



