<?php

namespace App\Http\Controllers\v1\posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\posts\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GetPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        $post = Post::query()->with(['user', 'tags', 'comments.user'])->find($id);
        if (!$post) {
            throw new ModelNotFoundException("Post not found");
        }
        return PostResource::make($post);
    }
}
