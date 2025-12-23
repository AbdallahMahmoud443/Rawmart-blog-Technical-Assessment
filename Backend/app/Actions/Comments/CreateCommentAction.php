<?php

namespace App\Actions\Comments;

use App\Http\Payloads\v1\comments\CreateCommentPayload;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CreateCommentAction
{
    public function execute(CreateCommentPayload $payload)
    {
        try {
            Comment::create([
                'content' =>    $payload->content,
                'post_id' =>    $payload->post_id,
                'user_id' =>    auth()->user()->id,
            ]);
            Log::info('Comment created successfully');
        } catch (\Exception $e) {
            Log::info('Comment created error: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
