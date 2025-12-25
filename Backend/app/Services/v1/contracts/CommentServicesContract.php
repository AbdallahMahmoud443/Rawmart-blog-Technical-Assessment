<?php

namespace App\Services\v1\contracts;

use App\Models\Comment;

interface CommentServicesContract
{

    public function GetComment(string $post_id, string $comment_id): Comment|null;
}
