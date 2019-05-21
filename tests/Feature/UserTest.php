<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_user_list()
    {
        $this->artisan('db:seed');
        $this->artisan('seed:dev');

        $this
            ->actingAs($this->getSuperadmin())
            ->get('/users')
            ->assertStatus(200)
            ->assertSee('Users')
            ->assertSee('New User')
            ->assertSee('Name')
            ->assertSee('E-mail');
    }

    /** @test */
    public function it_can_see_create_new_user_form()
    {
        $this->artisan('db:seed');
        $this->artisan('seed:dev');

        $this
            ->actingAs($this->getSuperadmin())
            ->get('/users/create')
            ->assertStatus(200)
            ->assertSee('Add New User')
            ->assertSee('E-Mail Address')
            ->assertSee('Password')
            ->assertSee('Confirm Password');
    }

    /** @test */
    public function it_can_create_new_user()
    {
        $this->artisan('db:seed');
        $this->artisan('seed:dev');

        $this
            ->actingAs($this->getSuperadmin())
            ->post('/users', [
                'name'                  => 'new user',
                'email'                 => 'new@user.com',
                'password'              => 'password',
                'password_confirmation' => 'password',
            ])->assertRedirect('/users');

        $this->assertDatabaseHas('users', [
            'name'  => 'new user',
            'email' => 'new@user.com',
        ]);
    }

    private function getSuperadmin()
    {
        return \App\Models\User::where('email', 'Superadmin@app.com')->first();
    }
}
