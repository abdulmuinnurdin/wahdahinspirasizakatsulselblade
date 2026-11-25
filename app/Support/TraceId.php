<?php

namespace App\Support;

use Illuminate\Support\Str;

final class TraceId
{
    private static ?string $current = null;

    public static function generate(): string
    {
        return self::$current = (string) Str::uuid();
    }

    public static function set(string $traceId): string
    {
        return self::$current = $traceId;
    }

    public static function current(): string
    {
        return self::$current ??= self::generate();
    }

    public static function clear(): void
    {
        self::$current = null;
    }
}
