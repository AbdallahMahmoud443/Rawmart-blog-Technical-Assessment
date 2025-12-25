<?php

namespace App\Http\Controllers\v1\comments;

use App\Actions\Comments\UpdateCommentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\comments\UpdateCommentsRequest;
use Dom\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

class UpdateCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        UpdateCommentsRequest $request,
        string $id,
        UpdateCommentAction $updateCommentAction
    ) {
        $updateCommentAction->execute($request->payload(), $id);
        return response()->json(['message' => 'Comment updated successfully'], 200);
    }
}
