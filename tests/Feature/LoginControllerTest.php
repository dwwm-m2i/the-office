<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_see_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Connexion', false);
    }

    public function test_guest_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'fiorella@boxydev.com',
        ]);

        $response = $this->post('/login', [
            'email' => 'fiorella@boxydev.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/salles');
    }

    public function test_guest_cannot_login_if_errors(): void
    {
        User::factory()->create([
            'email' => 'fiorella@boxydev.com',
        ]);

        $response = $this->post('/login', [
            'email' => 'fiorella@boxydev.com',
            'password' => 'pass',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Identifiants incorrects.',
        ])->assertSessionHasInput('email', 'fiorella@boxydev.com');

        $this->assertGuest();
    }
}
