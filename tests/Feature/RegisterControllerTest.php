<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    public function test_guest_can_see_register(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('S\'inscrire', false);
    }
}
