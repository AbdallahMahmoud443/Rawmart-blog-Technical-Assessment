<?php

namespace App\Http\Requests\v1\posts;

use App\Http\Payloads\v1\posts\UpdatePostPayload;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255,unique:posts,title,' . $this->id,
            'body' => 'sometimes|required|string|max:255',
            'tags' => 'required|array',
            'tags.*' => 'required|string|max:255,unique:tags,name',
        ];
    }

    public function payload(): UpdatePostPayload
    {
        return new UpdatePostPayload(
            title: $this->validated('title'),
            body: $this->validated('body'),
            tags: $this->validated('tags')
        );
    }
}
