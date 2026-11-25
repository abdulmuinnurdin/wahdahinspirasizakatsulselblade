<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Support\TraceId;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[LoginController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'LOGIN => '.$traceId.' => authenticated : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $user->id, 'email' => $user->email]
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->warning(
            $this->headerLog.'LOGIN => '.$traceId.' => sendFailedLoginResponse : FAILED',
            ['trace_id' => $traceId, 'email' => $request->input($this->username())]
        );

        return parent::sendFailedLoginResponse($request);
    }

    protected function loggedOut(Request $request)
    {
        $traceId = TraceId::current();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'LOGOUT => '.$traceId.' => loggedOut : SUCCESS',
            ['trace_id' => $traceId]
        );
    }
}
