<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::controller(ProductController::class)->middleware('auth')->group(function(){
    Route::get('/','index')->name('index');
    Route::post('store','store')->name('store');
    Route::post('update','update')->name('update');
    Route::post('delete','destroy')->name('delete');
    Route::get('show/{id}','show')->name('show');
    Route::get('invoice/{id}','invoice')->name('invoice');
});

Auth::routes(['verify'=>true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Route::post('verification',[controller])

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
