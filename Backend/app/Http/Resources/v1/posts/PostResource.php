<?php

namespace App\Http\Resources\v1\posts;

use App\Http\Resources\v1\authors\AuthorResource;
use App\Http\Resources\v1\comments\CommentResource;
use App\Http\Resources\v1\tags\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->resource->title,
            'body' => $this->resource->body,
            'expire_date' => $this->resource->expire_date,
            'tags' => $this->whenLoaded('tags', function ($tags) {
                return TagResource::collection($tags);
            }),
            'author' =>  new AuthorResource(
                $this->whenLoaded('user')
            ),
            'comments' => $this->whenLoaded('comments', function ($comments) {
                return CommentResource::collection($comments);
            })
        ];
    }
}
