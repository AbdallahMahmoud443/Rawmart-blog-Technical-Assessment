<?php

namespace App\Services\v1;

use App\Services\v1\contracts\TagServicesContract;
use Illuminate\Database\Eloquent\Collection;

class TagServices implements TagServicesContract
{
    public function getAllTags(): Collection
    {
        return   $tags = \App\Models\Tag::all();
    }
}
