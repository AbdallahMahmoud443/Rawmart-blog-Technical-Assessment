<?php

namespace App\Http\Resources\v1\comments;

use App\Http\Resources\v1\authors\AuthorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'content' => $this->resource->content,
            'author' =>  new AuthorResource($this->whenLoaded('user')),
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
