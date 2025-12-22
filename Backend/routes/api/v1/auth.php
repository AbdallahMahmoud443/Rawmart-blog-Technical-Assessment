<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post(uri: '/signup', action: function (Request $request) {
    dd($request);
})->name(name: 'signup');
