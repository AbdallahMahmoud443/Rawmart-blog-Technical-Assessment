<?php

namespace App\Http\Controllers\v1\posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\posts\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class GetPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        try {
            $post = Post::query()->with(['user'])->find($id);
            return PostResource::make($post);
        } catch (\Exception $e) {
            throw new \Exception("error in fetch post");
        }
    }
}
