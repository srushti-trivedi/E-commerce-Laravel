<?php

use Illuminate\Support\Facades\Route;

Route::get('shipping', 'ShippingController@welcome');
Route::middleware(['auth'])->group(function(){
	Route::get('checkout','ShippingController@billingStep')->name('checkout');
	Route::post('addBilling','ShippingController@addBilling');
	Route::get('shippingStep','ShippingController@shippingStep')->name('shippingStep');
	Route::post('addShipping','ShippingController@addShipping');
	Route::view('paymentStep','Shipping::Payment')->name('paymentStep');
	Route::post('addPayment','ShippingController@addPayment');
	Route::get('orderStep','ShippingController@orderStep')->name('orderStep');
	Route::post('addOrder','ShippingController@addOrder');
});

Route::get('orderViewStep','ShippingController@orderViewStep')->name('orderViewStep');
