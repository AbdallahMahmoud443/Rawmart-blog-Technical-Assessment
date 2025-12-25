<?php

namespace App\Services\v1;

use App\Models\Comment;
use App\Services\v1\contracts\CommentServicesContract;

class CommentServices implements CommentServicesContract
{
    public function GetComment(string $post_id, string $comment_id): Comment|null
    {
        return Comment::where('post_id', $post_id)->where('id', $comment_id)->first();
    }
}
