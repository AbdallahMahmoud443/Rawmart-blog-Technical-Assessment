<?php

declare(strict_types=1);

namespace App\Http\Controllers\v1\auth;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\auth\SignupRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SignupRequest $request, RegisterUserAction $action)
    {
        $token = $action->execute(payload: $request->payload());
        return response()->json([
            'message' => 'User created successfully',
            'token' => $token,
            'type' => 'Bearer',
        ], 201);
    }
}
