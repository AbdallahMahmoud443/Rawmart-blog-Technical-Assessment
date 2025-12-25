<?php

namespace App\Actions\Comments;

use App\Http\Payloads\v1\comments\UpdateCommentPayload;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;

class UpdateCommentAction
{
    public function execute(UpdateCommentPayload $payload, string $id)
    {
        $comment = Comment::find($id);
        Log::info('Updating comment' . $comment);
        if (!$comment) {
            throw new ModelNotFoundException("Comment not found");
            Log::info('Comment not found');
        }
        if (!Gate::allows('update', $comment)) {
            throw new UnauthorizedException(
                message: "You don't have permission to update this Comment"
            );
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
