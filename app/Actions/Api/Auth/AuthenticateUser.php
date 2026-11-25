<?php

namespace App\Actions\Api\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class AuthenticateUser
{
    public function handle(string $email, string $password, string $deviceName): array
    {
        $user = User::query()->where('email', $email)->first();

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'data.attributes.email' => ['Email atau password salah.'],
            ]);
        }

        $token = $user->createToken($deviceName)->plainTextToken;

        return [$user, $token];
    }
}
