<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\TraceId;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails {
        sendResetLinkResponse as private traitSendResetLinkResponse;
        sendResetLinkFailedResponse as private traitSendResetLinkFailedResponse;
    }

    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[ForgotPasswordController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    protected function sendResetLinkResponse(Request $request, $response)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'SENDRESETLINKEMAIL => '.$traceId.' => sendResetLinkResponse : SUCCESS',
            ['trace_id' => $traceId, 'email' => $request->input('email')]
        );

        return $this->traitSendResetLinkResponse($request, $response);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->warning(
            $this->headerLog.'SENDRESETLINKEMAIL => '.$traceId.' => sendResetLinkFailedResponse : FAILED',
            ['trace_id' => $traceId, 'email' => $request->input('email')]
        );

        return $this->traitSendResetLinkFailedResponse($request, $response);
    }
}
