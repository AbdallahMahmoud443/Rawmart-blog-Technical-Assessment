<?php

namespace App\Http\Controllers\v1\posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\posts\PostResource;
use App\Models\Post;
use App\Services\v1\contracts\PostServicesContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, PostServicesContract $postServices)
    {
        $posts = $postServices->GetPosts();
        Log::info('Posts retrieved successfully' . $posts);
        return PostResource::collection($posts);
    }
}
