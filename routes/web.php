<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::post('store','store')->name('store');
    Route::post('update','update')->name('update');
});
