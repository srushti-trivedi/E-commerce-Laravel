<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');



Route::view('/main','frontend.main');
Route::view('/mainlist','frontend.mainlist');
Route::view('/maingrid','frontend.maingrid');

Route::get('test/session', function(){
	$checkout_data = session()->get('checkout');
	dd($checkout_data);
	return $checkout_data;
});





