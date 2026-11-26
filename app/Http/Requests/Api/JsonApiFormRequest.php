<?php

namespace App\Http\Requests\Api;

use App\JsonApi\JsonApi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class JsonApiFormRequest extends FormRequest
{
    abstract protected function type(): string;

    protected function prepareForValidation(): void
    {
        if ($this->input('data.type') !== $this->type()) {
            throw new HttpResponseException(JsonApi::response(['errors' => [
                JsonApi::error(409, 'Conflict', 'Tipe resource tidak sesuai endpoint.', '/data/type'),
            ]], 409));
        }
    }
}
