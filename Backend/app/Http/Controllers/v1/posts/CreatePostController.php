<?php

namespace App\Http\Controllers\v1\posts;

use App\Actions\Posts\CreatePostAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\posts\CreatePostRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Payload;

class CreatePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreatePostRequest $request, CreatePostAction $action)
    {
        $postPayload = $request->payload();
        $post =  $action->execute(payload: $postPayload);
    }
}
