<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed');
        $this->artisan('seed:dev');
    }

    /** @test */
    public function it_can_access_landing_page_and_login()
    {
        $user = \App\Models\User::where('email', 'Superadmin@app.com')->first();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                ->assertSee('Arch')
                ->screenshot('01-landing-page')
                ->visit('/login')
                ->assertSee('Login')
                ->screenshot('02-login-page')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->screenshot('02-login-form-filled')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee('Superadmin')
                ->screenshot('03-redirected-to-home-after-successful-logged-in');
        });
    }
}
