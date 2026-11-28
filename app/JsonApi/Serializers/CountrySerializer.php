<?php

namespace App\JsonApi\Serializers;

use App\Models\Country\Country;

final class CountrySerializer
{
    public static function resource(Country $country): array
    {
        return [
            'type' => 'countries',
            'id' => (string) $country->getKey(),
            'attributes' => [
                'code' => $country->code,
                'name' => $country->name,
                'is_active' => $country->is_active,
            ],
        ];
    }

    /** @return array<int, array<string, mixed>> */
    public static function collection(iterable $countries): array
    {
        $result = [];

        foreach ($countries as $country) {
            $result[] = self::resource($country);
        }

        return $result;
    }
}
