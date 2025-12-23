<?php

namespace App\Http\Controllers\v1\comments;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\comments\CommentResource;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GetCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $post_id, string $id)
    {
        $comment = Comment::where('post_id', $post_id)->where('id', $id)->first();
        if (!$comment) {
            throw new ModelNotFoundException("Comment not found");
        }
        return CommentResource::make($comment);
    }
}
