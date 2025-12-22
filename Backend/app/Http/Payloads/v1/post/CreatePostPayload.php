<?php

namespace App\Http\Payloads\v1\post;



readonly class CreatePostPayload
{
    /**
     * @param string title
     * @param string body
     * @param array $tags
     */
    public function __construct(
        public string $title,
        public string $body,
        public array $tags,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'tags' => $this->tags,
        ];
    }
}
