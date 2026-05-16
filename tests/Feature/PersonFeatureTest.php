<?php

namespace Tests\Feature;

use Tests\TestCase;

class PersonFeatureTest extends TestCase
{
    /** @test */
    public function unauthenticated_users_are_redirected_to_login(): void
    {
        // Attempts to access the protected dashboard route
        $response = $this->get('/dashboard');

        // Asserts that the framework securely redirects them back to the login root
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}