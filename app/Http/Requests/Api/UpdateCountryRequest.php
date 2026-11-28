<?php

namespace App\Http\Requests\Api;

use Illuminate\Validation\Rule;

class UpdateCountryRequest extends JsonApiFormRequest
{
    protected function type(): string
    {
        return 'countries';
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'data.attributes.code' => [
                'sometimes', 'string', 'max:50',
                Rule::unique('countries', 'code')->ignore($this->route('country')),
            ],
            'data.attributes.name' => ['sometimes', 'string', 'max:255'],
            'data.attributes.is_active' => ['sometimes', 'boolean'],
        ];
    }
}
