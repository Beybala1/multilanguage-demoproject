<?php

use App\Http\Controllers\multipleFileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::resource('/post', PostController::class);
    Route::resource('/index', IndexController::class);
});



/* Route::get('/upload-files', [multipleFileController::class, 'index']);
Route::post('/upload-files', [multipleFileController::class, 'uploadFiles']); */