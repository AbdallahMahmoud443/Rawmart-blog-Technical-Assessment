<?php

namespace App\Actions\Comments;

use App\Http\Payloads\v1\comments\UpdateCommentPayload;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UpdateCommentAction
{
    public function execute(UpdateCommentPayload $payload, string $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            throw new ModelNotFoundException("Comment not found");
            Log::info('Comment not found');
        }
        try {
            $comment->update([
                'content' =>    $payload->content,
            ]);
            Log::info('Comment Updated successfully');
        } catch (\Exception $e) {
            Log::info('Comment Updated error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
