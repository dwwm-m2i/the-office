<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    // Permet de reset la base entre chaque tests
    use RefreshDatabase;

    public function test_guest_can_see_register(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('S\'inscrire', false);
    }

    public function test_guest_can_register(): void
    {
        $response = $this->post('/register', [
            'email' => 'fiorella@boxydev.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Vérifie que l'utilisateur a bien été créé dans la bdd
        $this->assertDatabaseHas('users', [
            'email' => 'fiorella@boxydev.com',
            'name' => 'fiorella',
        ]);

        // Vérifie que le mot de passe de l'utilisateur est bien hashé
        $user = User::find(1);
        $this->assertNotEquals('password', $user->password);

        // On doit être connecté en tant que Fiorella
        $this->assertAuthenticatedAs($user);

        // On doit être redirigé vers la liste des salles
        $response->assertRedirect('/salles');
    }

    public function test_guest_cannot_register_if_errors(): void
    {
        $response = $this->post('/register', [
            'email' => 'fiorella@boxydev.com',
            'password' => 'abcd',
            'password_confirmation' => 'abcd',
        ]);

        // On vérifie qu'on a bien une erreur sur le password dans la session
        $response->assertSessionHasErrors(['password']);

        // L'utilisateur ne doit pas être ajouté dans la base de données
        $this->assertDatabaseCount('users', 0);

        // On doit toujours être déconnecté
        $this->assertGuest();
    }
}
