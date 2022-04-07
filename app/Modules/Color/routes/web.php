<?php

use Illuminate\Support\Facades\Route;

Route::get('color', 'ColorController@welcome');
Route::get('colorform','ColorController@colorForm');
Route::post('add-color','ColorController@addColor');
Route::get('colorlist','ColorController@showColor');
Route::get('changeStatusColor', 'ColorController@changeStatus');

Route::get('edit-color/{id}','ColorController@edit');
Route::put('update-color','ColorController@update');

Route::delete('archive-color','ColorController@archive');
Route::get('trash-color','ColorController@trashView');

Route::post('restore-color','ColorController@restore');
Route::delete('deleteTrash-color','ColorController@destory');
