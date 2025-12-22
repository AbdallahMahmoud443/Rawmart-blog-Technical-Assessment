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
        try {

            $posts = Post::query()->with('user')->get();
            return PostResource::collection($posts);
        } catch (\Exception $e) {
            throw new \Exception("error in fetch posts:" . $e->getMessage());
        }
    }
}
