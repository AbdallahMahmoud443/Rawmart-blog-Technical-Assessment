<?php

use Illuminate\Http\File;

readonly class SignupPayload
{
    /**
     * @param string name
     * @param string email
     * @param string password
     * @param string password_confirmation
     * @param File image

     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $password_confirmation,
        public File $image,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'image' => $this->image,
        ];
    }
}
