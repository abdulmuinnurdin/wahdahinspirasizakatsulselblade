<?php

namespace App\JsonApi;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

final class JsonApiErrors
{
    public static function render(Throwable $e): ?JsonResponse
    {
        if ($e instanceof ValidationException) {
            $errors = [];
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    $errors[] = JsonApi::error(422, 'Invalid Attribute', $message, '/'.str_replace('.', '/', $field));
                }
            }

            return JsonApi::response(['errors' => $errors], 422);
        }

        if ($e instanceof AuthenticationException) {
            return JsonApi::response(['errors' => [
                JsonApi::error(401, 'Unauthenticated', 'Kredensial tidak valid atau token tidak ditemukan.'),
            ]], 401);
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return JsonApi::response(['errors' => [JsonApi::error(404, 'Not Found')]], 404);
        }

        return null;
    }
}
