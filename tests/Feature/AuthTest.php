<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_users_can_visit_register_page(): void
    {
        $response = $this->get(route('auth.register'));

        $response->assertOk();
        $response->assertViewIs('auth.register');
    }

    public function test_users_can_register(): void
    {
        $response = $this->post(route('auth.register'), [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'agreement' => true,
        ]);

        $response->assertRedirect();
        $this->assertAuthenticated();
    }

    public function test_users_can_visit_login_page(): void
    {
        $response = $this->get(route('auth.login'));

        $response->assertOk();
        $response->assertViewIs('auth.login');
    }

    public function test_users_can_login(): void
    {
        $user = User::factory()->createOne();
        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $this->assertAuthenticated();
    }

    public function test_cannot_login_with_invalid_credentials(): void
    {
        $user = User::factory()->createOne();
        $response = $this->post(route('auth.login'), [
            'email' => 'unregistered-email@gmail.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors();

        $response = $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
