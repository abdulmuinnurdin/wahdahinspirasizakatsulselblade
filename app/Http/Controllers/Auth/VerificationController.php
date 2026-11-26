<?php

namespace App\Http\Controllers\Auth;

use App\Support\TraceId;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[VerificationController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    protected function verified(Request $request)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'VERIFY => '.$traceId.' => verified : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $request->user()->id]
        );
    }

    public function resend(Request $request)
    {
        $traceId = TraceId::current();

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new \Illuminate\Http\JsonResponse([], 204)
                        : redirect($this->redirectPath());
        }

        $request->user()->sendEmailVerificationNotification();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'RESEND => '.$traceId.' => resend : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $request->user()->id]
        );

        return $request->wantsJson()
                    ? new \Illuminate\Http\JsonResponse([], 202)
                    : back()->with('resent', true);
    }
}
