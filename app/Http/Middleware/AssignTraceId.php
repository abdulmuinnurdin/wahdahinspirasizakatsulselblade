<?php

namespace App\Http\Middleware;

use App\Support\TraceId;
use Closure;
use Illuminate\Http\Request;

class AssignTraceId
{
    public function handle(Request $request, Closure $next)
    {
        $traceId = $request->header('X-Trace-Id') ?: TraceId::generate();
        TraceId::set($traceId);

        $response = $next($request);
        $response->headers->set('X-Trace-Id', $traceId);

        return $response;
    }
}
