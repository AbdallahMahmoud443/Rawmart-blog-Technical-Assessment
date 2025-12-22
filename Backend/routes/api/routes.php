<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->as('v1:')->group(static function (): void {
    Route::prefix('auth')->as('auth:')->group(base_path('routes/api/v1/auth.php'));
});
