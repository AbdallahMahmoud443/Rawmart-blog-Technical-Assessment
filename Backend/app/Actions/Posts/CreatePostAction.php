<?php

namespace App\Actions\Posts;

use App\Actions\Tags\CreateTagAction;
use App\Http\Payloads\v1\posts\CreatePostPayload;
use App\Models\Post;
use Illuminate\Container\Attributes\Log;

class CreatePostAction
{
    public function __construct(protected CreateTagAction $createTagAction) {}
    public function execute(CreatePostPayload $payload): Post
    {
        try {
            $postData = $payload->toArray();

            $post = Post::create([
                'title' => $postData['title'],
                'content' => $postData['content'],
                'author' => auth()->id(),
                'expire_date' => now()->addDays(1),
            ]);
            Log::info('Post created successfully');

            $tagIds = $this->createTagAction->execute($payload->tags);
            $post->tags()->sync($tagIds);
            Log::info('attached tags to post successfully');

            return $post;
        } catch (\Exception $e) {
            Log::error('Error creating post', $e->getMessage());
            throw new \Exception('Error creating post');
        }
    }
}
