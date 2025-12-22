<?php

use App\Http\Controllers\v1\posts\CreatePostController;
use Illuminate\Support\Facades\Route;

Route::post('/create', CreatePostController::class)->name('create');
