<?php

namespace App\Actions\Tags;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class SyncTagsAction
{

    public function execute(array $tags, Post $post)
    {
        try {
            if (!empty($tags)) {
                $tagIds = collect($tags)->map(function ($tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    return $tag->id;
                });
            }
            Log::info("Tags created successfully", ['tags' => $tags]);
            $post->tags()->sync($tagIds);
            Log::info('attached tags to post successfully');
        } catch (\Exception $e) {
            Log::info("Error creating tags");
            throw new \Exception('Error creating tags: ' . $e->getMessage());
        }
    }
}
