<?php

namespace App\Http\Controllers\v1\posts;

use App\Actions\Posts\CreatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\posts\CreatePostRequest;
use App\Http\Responses\v1\posts\MessageResponse;
use Illuminate\Http\Response;

class CreatePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreatePostRequest $request, CreatePostAction $action)
    {
        $postPayload = $request->payload();
        $post =  $action->execute(payload: $postPayload);
        return new MessageResponse(
            message: 'Post created successfully',
            post: $post,
            statusCode: Response::HTTP_CREATED
        );
    }
}
