<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
	Route::get('product', 'ProductController@welcome');
	Route::get('productform','ProductController@productForm');
	Route::post('add-product','ProductController@store');
	Route::get('productlist', 'ProductController@showProduct');
	Route::get('changeStatusProduct', 'ProductController@changeStatus');

	Route::get('edit-product/{id}','ProductController@editnew');


	Route::delete('deletecover/{id}','ProductController@deleteCover');
	Route::delete('deleteimage/{id}','ProductController@deleteImage');

	Route::put('update-product/{id}','ProductController@updatenew');

	Route::delete('archive-product','ProductController@archive');
	Route::get('trash-product','ProductController@trashView');

	Route::post('restore-product','ProductController@restore');
	Route::delete('deleteTrash-product','ProductController@destory');
});


