<?php

namespace App\Actions\Api\Auth;

use App\Models\User;
use App\Support\TraceId;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class AuthenticateUser
{
    /**
     * Header log: nama class pemicu, dipakai di setiap entry log.
     *
     * @var string
     */
    protected $headerLog = '[AuthenticateUser] => ';

    /**
     * Channel log yang dipakai action ini.
     *
     * @var string
     */
    protected $channelLog = 'auth';

    public function handle(string $email, string $password, string $deviceName): array
    {
        $traceId = TraceId::current();

        $user = User::query()->where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            Log::channel($this->channelLog)->warning(
                $this->headerLog.'HANDLE => '.$traceId.' => handle : FAILED',
                ['trace_id' => $traceId, 'email' => $email, 'device_name' => $deviceName]
            );

            throw ValidationException::withMessages([
                'data.attributes.email' => ['Email atau password salah.'],
            ]);
        }

        $token = $user->createToken($deviceName)->plainTextToken;

        Log::channel($this->channelLog)->info(
            $this->headerLog.'HANDLE => '.$traceId.' => handle : SUCCESS',
            ['trace_id' => $traceId, 'user_id' => $user->id, 'device_name' => $deviceName]
        );

        return [$user, $token];
    }
}
