<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/shopList', 'ShopListApiController@index')->name('apiIndex');
Route::get('/shopList/{id}', 'ShopListApiController@show')->name('apiShow');
Route::post('/shopList', 'ShopListApiController@store')->name('apiStore');
Route::put('/shopList/{id}', 'ShopListApiController@update')->name('apiUpdate');
Route::delete('/shopList/{id}', 'ShopListApiController@destroy')->name('apiDestroy');
