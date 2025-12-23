<?php

namespace App\Http\Controllers\v1\comments;

use App\Actions\Comments\DeleteCommentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\comments\CommentsRequest;
use Dom\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DeleteCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $id, DeleteCommentAction $deleteCommentAction)
    {
        $deleteCommentAction->execute($id);
        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
