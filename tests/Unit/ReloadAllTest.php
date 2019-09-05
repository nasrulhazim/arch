<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadAllTest extends TestCase
{
    /** @test */
    public function it_has_reload_all_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\Reload\ReloadAllCommand::class));
    }

    /** @test */
    public function it_can_reload_all()
    {
        $this->artisan('reload:all')
            ->expectsOutput('Application cache cleared!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Configuration cached successfully!')
            ->expectsOutput('Response cache cleared!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Routes cached successfully!')
            ->expectsOutput('Compiled views cleared!')
            ->expectsOutput('Dropped all tables successfully.')
            ->expectsOutput('Migration table created successfully.')
            ->expectsOutput('Seeding DatabaseSeeder...')
            ->expectsOutput('Successfully reload caches and database.')
            ->assertExitCode(0);
    }
}
