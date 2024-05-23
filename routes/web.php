<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers')->group(function() {
    Route::get('/', 'FormController@index')->name('home');
    Route::post('/', 'FormController@store');
});
