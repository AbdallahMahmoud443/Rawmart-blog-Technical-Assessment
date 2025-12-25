<?php

namespace App\Http\Controllers\v1\posts;

use App\Actions\Posts\DeletePostAction;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

class DeletePostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id, DeletePostAction $deletePostAction)
    {
   
        $is_deleted = $deletePostAction->execute($id);
        if ($is_deleted) return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
