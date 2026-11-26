<?php

namespace App\JsonApi\Serializers;

use App\Models\User;

final class UserSerializer
{
    public static function resource(User $user, array $meta = []): array
    {
        $resource = [
            'type' => 'users',
            'id' => (string) $user->getKey(),
            'attributes' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];

        if ($meta !== []) {
            $resource['meta'] = $meta;
        }

        return $resource;
    }
}
