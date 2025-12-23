<?php

namespace App\Http\Responses\v1\posts;

use App\Models\Post;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MessageResponse implements Responsable
{
    public function __construct(
        private string $message,
        private Post $post,
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
            "data" => [
                "message" => $this->message,
                "post" => $this->post
            ]
        ], status: $this->statusCode);
    }
}
