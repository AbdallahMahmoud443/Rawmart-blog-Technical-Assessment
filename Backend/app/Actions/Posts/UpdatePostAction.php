<?php

namespace App\Actions\Posts;

use App\Actions\Tags\SyncTagsAction;
use App\Http\Payloads\v1\posts\UpdatePostPayload;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class UpdatePostAction
{
    public function __construct(protected SyncTagsAction $SyncTagsAction) {}
    public function execute(string $post_id, UpdatePostPayload $payload): Post
    {
        try {
            $post = Post::findOrFail($post_id);
            $post->update([
                'title' => $payload->title,
                'body' => $payload->body,
            ]);
            Log::info('Post Updated successfully');
            $this->SyncTagsAction->execute($payload->tags, $post);
            return $post;
        } catch (\Exception $e) {
            Log::error('Error updating post: ' . $e->getMessage());
            throw new \Exception('Error updating post');
        }
    }
}
