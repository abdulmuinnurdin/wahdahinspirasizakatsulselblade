<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\TraceId;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[ResetPasswordController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected function sendResetResponse(Request $request, $response)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'RESET => '.$traceId.' => sendResetResponse : SUCCESS',
            ['trace_id' => $traceId, 'email' => $request->input('email')]
        );

        return parent::sendResetResponse($request, $response);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->warning(
            $this->headerLog.'RESET => '.$traceId.' => sendResetFailedResponse : FAILED',
            ['trace_id' => $traceId, 'email' => $request->input('email')]
        );

        return parent::sendResetFailedResponse($request, $response);
    }
}
