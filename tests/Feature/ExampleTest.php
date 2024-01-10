<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_hello_route_returns_hello()
    {
        $response = $this->get('/hello');

        $response->assertSee('<h1>Hello Toto</h1>', false);
    }

    public function test_formulaire_affichage()
    {
        $response = $this->get('/formulaire');
        $response ->assertSee('<label for="prix">prix:</label>',false);
        $response->assertSee('<label for="nom">nom de la salle:</label>',false);
    }
}
