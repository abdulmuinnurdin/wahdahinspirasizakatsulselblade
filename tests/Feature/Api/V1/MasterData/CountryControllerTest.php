<?php

namespace Tests\Feature\Api\V1\MasterData;

use App\Models\Country\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryControllerTest extends TestCase
{
    use RefreshDatabase;

    private const MEDIA_TYPE = 'application/vnd.api+json';

    public function test_guest_cannot_list_countries(): void
    {
        $this->getJson('/api/v1/countries', ['Accept' => self::MEDIA_TYPE])
            ->assertStatus(401);
    }

    public function test_authenticated_user_can_create_country(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/v1/countries', [
                'data' => [
                    'type' => 'countries',
                    'attributes' => ['code' => 'ID', 'name' => 'Indonesia'],
                ],
            ], ['Content-Type' => self::MEDIA_TYPE, 'Accept' => self::MEDIA_TYPE]);

        $response->assertStatus(201)
            ->assertHeader('Content-Type', self::MEDIA_TYPE)
            ->assertHeader('Location')
            ->assertJsonPath('data.type', 'countries')
            ->assertJsonPath('data.attributes.code', 'ID');

        $this->assertDatabaseHas('countries', ['code' => 'ID', 'name' => 'Indonesia']);
    }

    public function test_duplicate_code_is_rejected_with_pointer(): void
    {
        $user = User::factory()->create();
        Country::factory()->create(['code' => 'ID']);

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/v1/countries', [
                'data' => [
                    'type' => 'countries',
                    'attributes' => ['code' => 'ID', 'name' => 'Indonesia Lain'],
                ],
            ], ['Content-Type' => self::MEDIA_TYPE, 'Accept' => self::MEDIA_TYPE]);

        $response->assertStatus(422)
            ->assertJsonPath('errors.0.source.pointer', '/data/attributes/code');
    }

    public function test_deactivate_and_activate_toggle_status(): void
    {
        $user = User::factory()->create();
        $country = Country::factory()->create(['is_active' => true]);

        $this->actingAs($user, 'sanctum')
            ->postJson("/api/v1/countries/{$country->id}/deactivate", [], [
                'Content-Type' => self::MEDIA_TYPE, 'Accept' => self::MEDIA_TYPE,
            ])
            ->assertStatus(200)
            ->assertJsonPath('data.attributes.is_active', false);

        $this->actingAs($user, 'sanctum')
            ->postJson("/api/v1/countries/{$country->id}/activate", [], [
                'Content-Type' => self::MEDIA_TYPE, 'Accept' => self::MEDIA_TYPE,
            ])
            ->assertStatus(200)
            ->assertJsonPath('data.attributes.is_active', true);
    }
}
