<?php

namespace App\Http\Payloads\v1\comments;



readonly class UpdateCommentPayload
{
    /**
     * @param string content

     */
    public function __construct(
        public string $content,
    ) {}

    public function toArray(): array
    {
        return [
            'content' => $this->content,
        ];
    }
}
