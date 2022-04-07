<?php

use Illuminate\Support\Facades\Route;

Route::get('brand', 'BrandController@welcome');
Route::get('brandform', 'BrandController@brandForm');
Route::post('add-brand','BrandController@addData');
Route::get('brandlist', 'BrandController@showBrand');
Route::get('changeStatusBrand', 'BrandController@changeStatus');

Route::get('edit-brand/{id}','BrandController@edit');
Route::put('update-brand','BrandController@update');

Route::delete('archive-brand','BrandController@archive');
Route::get('trash-brand','BrandController@trashView');

Route::post('restore-brand','BrandController@restore');
Route::delete('deleteTrash-brand','BrandController@destory');
