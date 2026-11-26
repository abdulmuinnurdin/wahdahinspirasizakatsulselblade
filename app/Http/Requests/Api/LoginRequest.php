<?php

namespace App\Http\Requests\Api;

class LoginRequest extends JsonApiFormRequest
{
    protected function type(): string
    {
        return 'logins';
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data.attributes.email' => ['required', 'string', 'email'],
            'data.attributes.password' => ['required', 'string'],
            'data.attributes.device_name' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
