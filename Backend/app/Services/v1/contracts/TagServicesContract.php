<?php

namespace App\Services\v1\contracts;

use Illuminate\Database\Eloquent\Collection;

interface TagServicesContract
{
    public function getAllTags(): Collection; // get all tags
}
