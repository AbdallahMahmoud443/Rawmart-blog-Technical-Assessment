<?php

namespace App\Actions\Posts;

use App\Actions\Tags\SyncTagsAction;
use App\Http\Payloads\v1\posts\UpdatePostPayload;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;

class UpdatePostAction
{
    public function __construct(protected SyncTagsAction $SyncTagsAction) {}
    public function execute(string $post_id, UpdatePostPayload $payload): Post
    {
        $post = Post::findOrFail($post_id);
        if (!Gate::allows('update', $post)) {
            throw new UnauthorizedException(
                message: "You don't have permission to update this post"
            );
        }
        try {
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
