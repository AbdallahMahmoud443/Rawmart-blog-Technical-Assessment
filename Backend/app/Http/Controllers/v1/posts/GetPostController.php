<?php

namespace App\Http\Controllers\v1\posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\posts\PostResource;
use App\Models\Post;
use App\Services\v1\contracts\PostServicesContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GetPostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id, PostServicesContract $postServices)
    {
        $post = $postServices->GetPost($id);
        if (!$post) {
            throw new ModelNotFoundException("Post not found");
        }
        return PostResource::make($post);
    }
}
