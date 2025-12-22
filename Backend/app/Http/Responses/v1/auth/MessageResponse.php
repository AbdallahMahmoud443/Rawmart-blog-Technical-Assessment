<?php

namespace App\Http\Responses\v1\auth;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MessageResponse implements Responsable
{

    public function __construct(
        private string $message,
        private string $access_token,
        private string $token_type,
        private int $expires_in,
        private int $statusCode = Response::HTTP_OK
    ) {}
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(data: [
            'message' => $this->message,
            'access_token' => $this->access_token,
            'token_type' => $this->token_type,
            'expire_in' => $this->expires_in,
        ], status: $this->statusCode);
    }
}
