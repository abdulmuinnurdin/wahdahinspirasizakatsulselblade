<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Api\Auth\AuthenticateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\JsonApi\JsonApi;
use App\JsonApi\Serializers\UserSerializer;
use App\Support\TraceId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[Api\\V1\\AuthController] => ';

    /**
     * Channel log yang dipakai controller ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    public function login(LoginRequest $request, AuthenticateUser $authenticateUser)
    {
        [$user, $token] = $authenticateUser->handle(
            $request->validated('data.attributes.email'),
            $request->validated('data.attributes.password'),
            $request->validated('data.attributes.device_name', 'api'),
        );

        return JsonApi::response(JsonApi::document(
            UserSerializer::resource($user, ['token' => $token, 'token_type' => 'Bearer']),
        ));
    }

    public function me(Request $request)
    {
        $traceId = TraceId::current();

        Log::channel('frontend')->info(
            $this->headerLog.'ME => '.$traceId.' => me : RUN',
            ['trace_id' => $traceId, 'user_id' => $request->user()->id]
        );

        return JsonApi::response(JsonApi::document(
            UserSerializer::resource($request->user()),
        ));
    }

    public function logout(Request $request)
    {
        $traceId = TraceId::current();
        $userId = $request->user()->id;

        $request->user()->currentAccessToken()->delete();

        Log::channel($this->channelLog)->info(
            $this->headerLog.'LOGOUT => '.$traceId.' => logout : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $userId]
        );

        return response()->noContent();
    }
}
