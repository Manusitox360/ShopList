<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShopListApiController;

Route::get('/shopList', [ShopListApiController::class, 'index'])->name('apiIndex');
Route::get('/shopList/{id}', [ShopListApiController::class, 'show'])->name('apiShow');
Route::post('/shopList', [ShopListApiController::class, 'store'])->name('apiStore');
Route::put('/shopList/{id}', [ShopListApiController::class, 'update'])->name('apiUpdate');
Route::delete('/shopList/{id}', [ShopListApiController::class, 'destroy'])->name('apiDestroy');
