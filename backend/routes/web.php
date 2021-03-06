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

Route::get('/', 'ShopController@index');
Route::get('/search', 'ShopController@search');
Route::get('/tag/{name}', 'ShopController@tagSearch');

Route::middleware(['auth'])->group(function () {
    Route::get('/mycart', 'ShopController@myCart');
    Route::post('/mycart', 'ShopController@addMycart');
    Route::post('/cartupdate', 'ShopController@updateMycart');
    Route::post('/cartdelete', 'ShopController@deleteCart');
    Route::post('/checkout', 'ShopController@checkout');
    Route::get('/history', 'HistoryController@history');
    Route::get('/history/{cart_version}', 'HistoryController@detail');
});

Auth::routes();
