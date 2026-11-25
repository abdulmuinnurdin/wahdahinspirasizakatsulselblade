<?php

namespace App\Http\Middleware;

use App\JsonApi\JsonApi;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnforceJsonApi
{
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->method(), ['POST', 'PATCH'], true)
            && $request->getContent() !== ''
            && ! $this->hasAllowedContentType((string) $request->header('Content-Type'))) {
            return JsonApi::response(['errors' => [
                JsonApi::error(415, 'Unsupported Media Type', 'Gunakan application/vnd.api+json tanpa parameter selain ext dan profile.'),
            ]], 415);
        }

        $response = $next($request);
        $response->headers->set('Content-Type', JsonApi::MEDIA_TYPE);

        return $response;
    }

    private function hasAllowedContentType(string $header): bool
    {
        $parts = array_map('trim', explode(';', $header));

        if (($parts[0] ?? '') !== JsonApi::MEDIA_TYPE) {
            return false;
        }

        foreach (array_slice($parts, 1) as $param) {
            $name = strtolower(trim(explode('=', $param, 2)[0]));
            if (! in_array($name, ['ext', 'profile'], true)) {
                return false;
            }
        }

        return true;
    }
}
