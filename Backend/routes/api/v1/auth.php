<?php

use App\Http\Controllers\v1\auth\LoginController;
use App\Http\Controllers\v1\auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::post(uri: '/signup', action: RegisterController::class)->name(name: 'signup');
Route::post(uri: '/login', action: LoginController::class)->name(name: 'login');
