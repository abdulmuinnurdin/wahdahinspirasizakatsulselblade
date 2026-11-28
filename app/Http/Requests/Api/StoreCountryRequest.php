<?php

namespace App\Http\Requests\Api;

class StoreCountryRequest extends JsonApiFormRequest
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
            'data.attributes.code' => ['required', 'string', 'max:50', 'unique:countries,code'],
            'data.attributes.name' => ['required', 'string', 'max:255'],
            'data.attributes.is_active' => ['sometimes', 'boolean'],
        ];
    }
}
