<?php

use Illuminate\Support\Facades\Route;

Route::get('order', 'OrderController@welcome');
Route::get('orderList','OrderController@Index');
Route::get('invoice/{id}','OrderController@invoiceView');

					