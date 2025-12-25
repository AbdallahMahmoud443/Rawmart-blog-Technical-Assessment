<?php

namespace App\Actions\Posts;

use App\Jobs\v1\posts\DeleteExpiredPostsJob;
use App\Models\Post;

class RunPostDeleteJobAction
{
    public function execute(Post $post)
    {
        DeleteExpiredPostsJob::dispatch($post->id)->delay($post->expire_date);
    }
}
