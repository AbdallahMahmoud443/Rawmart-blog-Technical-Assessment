<?php



namespace App\Services\v1\contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

interface PostServicesContract
{
    public function GetPosts(): Collection;
    public function GetPost(string $post_id): Post;
}
