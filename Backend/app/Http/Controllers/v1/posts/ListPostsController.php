<?php

namespace App\Http\Controllers\v1\posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\posts\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class ListPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::query()->with(['user', 'tags'])->get();
        return PostResource::collection($posts);
    }
}
