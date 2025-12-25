<?php

namespace App\Http\Controllers\v1\comments;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\comments\CommentResource;
use App\Models\Comment;
use App\Services\v1\contracts\CommentServicesContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GetCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $post_id, string $id, CommentServicesContract $commentServices)
    {
        $comment = $commentServices->GetComment($post_id, $id);
        if (!$comment) {
            throw new ModelNotFoundException("Comment not found");
        }
        return CommentResource::make($comment);
    }
}
