<?php

namespace App\Http\Controllers\v1\tags;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\tags\TagResource;
use App\Services\v1\contracts\TagServicesContract;
use Illuminate\Http\Request;

class ListTagsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TagServicesContract $tagServices)
    {
        $tags = $tagServices->getAllTags();
        return TagResource::collection($tags);
    }
}
