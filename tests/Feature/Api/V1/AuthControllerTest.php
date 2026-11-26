<?php

namespace Tests\Feature\Api\V1;

use App\JsonApi\JsonApi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    private function loginPayload(array $attributes): array
    {
        return [
            'data' => [
                'type' => 'logins',
                'attributes' => $attributes,
            ],
        ];
    }

    private function postJsonApi(string $uri, array $data): TestResponse
    {
        return $this->call('POST', $uri, server: [
            'CONTENT_TYPE' => JsonApi::MEDIA_TYPE,
            'HTTP_ACCEPT' => JsonApi::MEDIA_TYPE,
        ], content: json_encode($data));
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'amil@example.test',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->postJsonApi('/api/v1/auth/login', $this->loginPayload([
            'email' => 'amil@example.test',
            'password' => 'secret123',
        ]));

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/vnd.api+json')
            ->assertJsonStructure([
                'jsonapi' => ['version'],
                'data' => ['type', 'id', 'attributes' => ['name', 'email'], 'meta' => ['token', 'token_type']],
            ])
            ->assertJsonPath('data.type', 'users')
            ->assertJsonPath('data.id', (string) $user->id);
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'amil@example.test',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->postJsonApi('/api/v1/auth/login', $this->loginPayload([
            'email' => 'amil@example.test',
            'password' => 'wrong-password',
        ]));

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [['status', 'title', 'detail', 'source' => ['pointer']]],
            ])
            ->assertJsonPath('errors.0.source.pointer', '/data/attributes/email');
    }

    public function test_login_requires_email_and_password(): void
    {
        $response = $this->postJsonApi('/api/v1/auth/login', $this->loginPayload([]));

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [['status', 'title', 'source' => ['pointer']]],
            ]);
    }

    public function test_login_rejects_mismatched_resource_type(): void
    {
        $response = $this->postJsonApi('/api/v1/auth/login', [
            'data' => [
                'type' => 'wrong-type',
                'attributes' => ['email' => 'a@a.com', 'password' => 'secret'],
            ],
        ]);

        $response->assertStatus(409)
            ->assertJsonPath('errors.0.source.pointer', '/data/type');
    }

    public function test_authenticated_user_can_fetch_profile_and_logout(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('test-device')->plainTextToken;

        $this->withHeader('Authorization', 'Bearer '.$token)
            ->getJson('/api/v1/auth/me')
            ->assertStatus(200)
            ->assertJsonPath('data.id', (string) $user->id)
            ->assertJsonPath('data.attributes.email', $user->email);

        $this->withHeader('Authorization', 'Bearer '.$token)
            ->deleteJson('/api/v1/auth/logout')
            ->assertStatus(204);

        $this->app['auth']->forgetGuards();

        $this->withHeader('Authorization', 'Bearer '.$token)
            ->getJson('/api/v1/auth/me')
            ->assertStatus(401);
    }

    public function test_me_requires_authentication(): void
    {
        $this->getJson('/api/v1/auth/me')
            ->assertStatus(401)
            ->assertJsonStructure(['errors' => [['status', 'title']]]);
    }
}
