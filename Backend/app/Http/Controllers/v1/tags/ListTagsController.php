<?php

namespace App\Http\Controllers\v1\tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\tags\TagResource;
use Illuminate\Http\Request;

class ListTagsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tags = \App\Models\Tag::all();
        return TagResource::collection($tags);
    }
}
