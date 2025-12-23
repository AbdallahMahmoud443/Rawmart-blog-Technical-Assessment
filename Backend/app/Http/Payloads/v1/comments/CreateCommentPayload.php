<?php

namespace App\Http\Payloads\v1\comments;



readonly class CreateCommentPayload
{
    /**
     * @param string content
     * @param string $post_id
     */
    public function __construct(
        public string $content,
        public string $post_id,
    ) {}

    public function toArray(): array
    {
        return [
            'content' => $this->content,
            'post_id' => $this->post_id,
        ];
    }
}
