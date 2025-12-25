<?php

namespace App\Http\Requests\v1\posts;

use App\Http\Payloads\v1\posts\CreatePostPayload;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:posts,title',
            'body' => 'required|string',
            'tags' => 'required|array',
            'tags.*' => 'required|string|max:50',

        ];
    }

    public function payload(): CreatePostPayload
    {
        return new CreatePostPayload(
            title: $this->validated('title'),
            body: $this->validated('body'),
            tags: $this->validated('tags')
        );
    }
}
