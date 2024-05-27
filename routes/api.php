<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers')->group(function() {
    Route::get('/users', 'ApiController@index');
});

