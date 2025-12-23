<?php

namespace App\Http\Controllers\v1\comments;

use App\Actions\Comments\CreateCommentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\comments\CreateCommentsRequest;


class CreateCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateCommentsRequest $request, CreateCommentAction $createCommentAction)
    {
        $createCommentAction->execute($request->payload());
        return response()->json([
            'message' => 'Comment created successfully',
        ]);
    }
}
