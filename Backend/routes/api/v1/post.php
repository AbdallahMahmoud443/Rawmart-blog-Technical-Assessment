<?php

use App\Http\Controllers\v1\posts\CreatePostController;
use App\Http\Controllers\v1\posts\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::post('/create', CreatePostController::class)->name('create');
Route::post('/update', UpdatePostController::class)->name('update');
