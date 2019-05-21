<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function main_page_return_status_code_200()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSee('Login');
    }

    /** @test */
    public function can_login_from_main_page()
    {
        $this->artisan('db:seed');
        $this->artisan('seed:dev');

        $response = $this->post('/login', [
            'email'    => 'Superadmin@app.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302)
            ->assertRedirect('/home');
    }
}
