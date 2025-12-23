<?php

namespace App\Http\Requests\v1\comments;

use App\Http\Payloads\v1\comments\UpdateCommentPayload;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentsRequest extends FormRequest
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
            'content' => 'required|string|max:255',
        ];
    }
    public function payload()
    {
        return new UpdateCommentPayload(
            content: $this->validated('content'),
        );
    }
}
