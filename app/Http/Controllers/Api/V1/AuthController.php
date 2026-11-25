<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Api\Auth\AuthenticateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\JsonApi\JsonApi;
use App\JsonApi\Serializers\UserSerializer;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
        return JsonApi::response(JsonApi::document(
            UserSerializer::resource($request->user()),
        ));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
