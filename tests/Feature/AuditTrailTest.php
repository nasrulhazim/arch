<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuditTrailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_audit_trail_page()
    {
        $this->artisan('db:seed', [
            '--class' => 'RolesAndPermissionsSeeder',
        ]);

        $user = factory(\App\Models\User::class)->create([
            'email'   => 'Superadmin@app.com',
        ])->assignRole('Superadmin');

        $response = $this->actingAs($user)
                         ->get('/audit');

        $response->assertStatus(200)
            ->assertSee('Audit Trails');
    }
}
