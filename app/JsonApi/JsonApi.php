<?php

namespace App\JsonApi;

use Illuminate\Http\JsonResponse;

final class JsonApi
{
    public const MEDIA_TYPE = 'application/vnd.api+json';

    public static function document(mixed $data, array $members = []): array
    {
        return ['jsonapi' => ['version' => '1.1'], 'data' => $data] + $members;
    }

    public static function response(array $document, int $status = 200, array $headers = []): JsonResponse
    {
        return response()->json($document, $status, ['Content-Type' => self::MEDIA_TYPE] + $headers);
    }

    public static function error(int $status, string $title, ?string $detail = null, ?string $pointer = null, ?string $parameter = null): array
    {
        $error = ['status' => (string) $status, 'title' => $title];

        if ($detail !== null) {
            $error['detail'] = $detail;
        }
        if ($pointer !== null) {
            $error['source']['pointer'] = $pointer;
        }
        if ($parameter !== null) {
            $error['source']['parameter'] = $parameter;
        }

        return $error;
    }
}
