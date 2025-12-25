<?php

namespace App\Actions\Posts;


use App\Actions\Tags\SyncTagsAction;
use App\Http\Payloads\v1\posts\CreatePostPayload;
use App\Jobs\v1\posts\DeletePostJob;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class CreatePostAction
{
    public function __construct(protected SyncTagsAction $SyncTagsAction, protected RunPostDeleteJobAction $runPostDeleteJobAction) {}
    public function execute(CreatePostPayload $payload): Post
    {
        try {
            $post = Post::create([
                'title' => $payload->title,
                'body' => $payload->body,
                'author' => auth()->id(),
                'expire_date' => now()->addMinutes(3),
            ]);
            Log::info('Post created successfully');
            $this->SyncTagsAction->execute($payload->tags, $post);
            return $post;
        } catch (\Exception $e) {
            Log::info('Error creating post', ['error' => $e->getMessage()]);
            throw new \Exception('Error creating post');
        }
    }
}
