<?php

namespace App\Actions\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\UnauthorizedException;

class DeletePostAction
{
    public function execute(string $id)
    {
        $post = Post::findOrFail($id);
        if (!Gate::allows('delete', $post)) {
            throw new UnauthorizedException(
                message: "You don't have permission to delete this post"
            );
        }
        try {
            $is_deleted = $post->delete();
            if ($is_deleted)
                Log::info('post deleted successfully');
            return $is_deleted;
        } catch (\Exception $e) {
            Log::info('Error deleting post: ' . $e->getMessage());
            return new \Exception('error in deleting post');
        }
    }
}
