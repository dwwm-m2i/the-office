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

    public function test_display_form()
    {
        $response = $this->get('/formulaire');

        $response ->assertSee('<label for="price">prix:</label>',false);
        $response->assertSee('<label for="name">nom de la salle:</label>',false);
    }

    public function test_validation_form()
    {
        $response = $this->post('/formulaire', [
            'name' => 'Une salle',
            'price' => 12.12,
        ]);

        $response->assertSessionHasNoErrors();

        $response = $this->post('/formulaire', [
            'name' => '',
            'price' => 'mauvais prix',
        ]);

        $response->assertSessionHasErrors(['name', 'price']);
    }

    public function test_salles_route_returns_rooms_list()
    {
        $response = $this->get('/salles');

        $response->assertSee('<th>ID</th>', false);
        $response->assertSee('<th>Nom de la Salle</th>', false);
        $response->assertSee('<th>Prix de la salle</th>', false);
        $response->assertSee('<td> 1 </td>', false);
        $response->assertSee('<td> chambre 1 </td>', false);
        $response->assertSee('<td> 250 </td>', false);
        $response->assertSee('<td> 2 </td>', false);
        $response->assertSee('<td> chambre 2 </td>', false);
        $response->assertSee('<td> 250 </td>', false);
        $response->assertSee('<td> 3 </td>', false);
        $response->assertSee('<td> chambre 3 </td>', false);
        $response->assertSee('<td> 250 </td>', false);
    }
}
