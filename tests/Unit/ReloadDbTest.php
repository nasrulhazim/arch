<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadDbTest extends TestCase
{
    /** @test */
    public function it_has_reload_db_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\Reload\ReloadDbCommand::class));
    }

    /** @test */
    public function it_can_reload_db()
    {
        $this->artisan('reload:db')
            ->expectsOutput('Dropped all tables successfully.')
            ->expectsOutput('Migration table created successfully.')
            ->expectsOutput('Seeding DatabaseSeeder...')
            ->expectsOutput('Database seeding completed successfully.')
            ->expectsOutput('Database seeding completed successfully.')
            ->expectsOutput('Database seeding completed successfully.')
            ->expectsOutput('Database seeding completed successfully.')
            ->assertExitCode(0);
    }
}
