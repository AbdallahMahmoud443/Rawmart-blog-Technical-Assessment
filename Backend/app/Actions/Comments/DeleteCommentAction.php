<?php

namespace App\Actions\Comments;

use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DeleteCommentAction
{
    public function execute(string $id)
    {
        $comment = Comment::where('id', $id)
            ->where('user_id', auth()->id())->first();
        if (!$comment) {
            throw new ModelNotFoundException("Comment not found");
        }
        try {
            $comment->delete();
            Log::info('Comment Updated successfully');
        } catch (\Exception $e) {
            Log::info('Comment Updated error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
