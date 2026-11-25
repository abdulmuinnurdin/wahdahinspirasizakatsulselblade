<?php

namespace App\Logging;

use App\Support\TraceId;
use Illuminate\Log\Logger;
use Monolog\LogRecord;

class TraceIdTap
{
    public function __invoke(Logger $logger): void
    {
        $logger->pushProcessor(function (LogRecord $record) {
            $record->extra['trace_id'] = TraceId::current();

            return $record;
        });
    }
}
