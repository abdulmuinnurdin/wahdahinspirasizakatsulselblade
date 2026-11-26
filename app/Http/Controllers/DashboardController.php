<?php

namespace App\Http\Controllers;

use App\Support\TraceId;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[DashboardController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'frontend';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'INDEX => '.$traceId.' => index : RUN',
            ['trace_id' => $traceId, 'user_id' => auth()->id()]
        );

        return view('dashboard');
    }
}
