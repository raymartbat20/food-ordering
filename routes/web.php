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
    return view('main');
});

Route::post('order/checkout','OrderController@checkout');
Route::get('order/lists','OrderController@lists')->name('order.lists');
Route::resource('order','OrderController');
Route::post('check-coupon','CouponController@search');