<?php

namespace App\Http\Controllers;

use App\Support\TraceId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[HomeController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'frontend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'INDEX => '.$traceId.' => index : RUN',
            ['trace_id' => $traceId, 'user_id' => auth()->id()]
        );

        return view('home');
    }
}
