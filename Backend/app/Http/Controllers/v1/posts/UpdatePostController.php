<?php

namespace App\Http\Controllers\v1\posts;

use App\Actions\Posts\UpdatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\posts\UpdatePostRequest;
use App\Http\Responses\v1\posts\MessageResponse;
use Illuminate\Http\Response;

class UpdatePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdatePostRequest $request, string $id, UpdatePostAction $updatePostAction)
    {
        $post = $updatePostAction->execute(
            post_id: $id,
            payload: $request->payload()
        );
        return new MessageResponse(
            message: 'Post Update successfully',
            post: $post,
            statusCode: Response::HTTP_OK
        );
    }
}
