<?php

use Illuminate\Support\Facades\Route;

Route::get('frontend', 'FrontendController@welcome');
Route::view('mainindex','Frontend::mainIndex');
Route::get('products','FrontendController@Index')->name('products');
Route::get('frontListGrid','FrontendController@listGridView');
Route::get('frontFilter','FrontendController@frontFilter');

Route::get('/products/{product_url}','FrontendController@details');

Route::get('increment/{id}','FrontendController@increment');
Route::get('cart','CartController@Index')->name('cart');

Route::get('/add-to-cart','CartController@addToCartData');
Route::get('incrementcart/{id}','CartController@increment');
Route::get('delete-cart','CartController@removeCartData');
Route::post('update-qty-cart','CartController@updateQtyCart');
Route::get('minicart','CartController@miniCart');
// Route::middleware(['auth'])->group(function(){

//});
// Route::get('frontlist','FrontendController@listIndex');
// Route::get('frontgrid','FrontendController@gridIndex');


// Route::get('try','FrontendController@try');
// Route::get('details','FrontendController@views');	