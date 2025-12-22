<?php

namespace App\Http\Requests\v1\auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Payloads\v1\auth\SignupPayload;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function payload(): SignupPayload
    {
        return new SignupPayload(
            name: $this->validated('name'),
            email: $this->validated('email'),
            password: $this->validated('password'),
            password_confirmation: $this->validated('password_confirmation'),
            image: $this->validated('image')
        );
    }
}
