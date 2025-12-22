<?php

use App\Http\Controllers\v1\auth\SignupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post(uri: '/signup', action: SignupController::class)->name(name: 'signup');
