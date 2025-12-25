<?php

namespace App\Services\v1;

use App\Models\Post;
use App\Services\v1\contracts\PostServicesContract;
use Illuminate\Database\Eloquent\Collection;

class PostServices implements PostServicesContract
{
    public function GetPosts(): Collection
    {
        return Post::query()->with(['user', 'tags'])->get();
    }
    public function GetPost(string $post_id): Post
    {
        return Post::query()->with(['user', 'tags', 'comments.user'])->find($post_id);
    }
}
