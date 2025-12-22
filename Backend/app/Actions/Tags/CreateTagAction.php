<?php

namespace App\Actions\Tags;

use App\Models\Tag;
use Illuminate\Support\Facades\Log;

class CreateTagAction
{

    public function execute(array $tags)
    {
        try {
            if (!empty($tags)) {
                $tagIds = collect($tags)->map(function ($tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    return $tag->id;
                });
            }
            Log::info("Tags created successfully", ['tags' => $tags]);
            return $tagIds;
        } catch (\Exception $e) {
            Log::info("Error creating tags");
            throw new \Exception('Error creating tags: ' . $e->getMessage());
        }
    }
}
