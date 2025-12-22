<?php

declare(strict_types=1);

namespace App\Http\Controllers\v1\auth;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\auth\SignupRequest;
use App\Http\Responses\v1\auth\MessageResponse;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SignupRequest $request, RegisterUserAction $action): MessageResponse
    {
        $token = $action->execute(payload: $request->payload());
        return new MessageResponse(
            message: 'User created successfully',
            access_token: $token,
            token_type: 'Bearer',
            expires_in: auth()->factory()->getTTL() * 60,
            statusCode: Response::HTTP_CREATED
        );
    }
}
