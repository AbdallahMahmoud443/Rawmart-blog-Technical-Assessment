<?php

namespace App\Http\Controllers\v1\comments;

use App\Actions\Comments\DeleteCommentAction;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

class DeleteCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, DeleteCommentAction $deleteCommentAction)
    {
        if (!Gate::allows('delete', Comment::class)) {
            throw new UnauthorizedException(
                message: "You don't have permission to delete this Comment"
            );
        }
        $deleteCommentAction->execute($id);
        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
