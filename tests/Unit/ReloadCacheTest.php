<?php

namespace Tests\Unit;

use Tests\TestCase;

class ReloadCacheTest extends TestCase
{
    /** @test */
    public function it_has_reload_cache_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\Reload\ReloadCacheCommand::class));
    }

    /** @test */
    public function it_can_reload_caches()
    {
        $this->artisan('reload:cache')
            ->expectsOutput('Application cache cleared!')
            ->expectsOutput('Configuration cache cleared!')
            ->expectsOutput('Configuration cached successfully!')
            ->expectsOutput('Response cache cleared!')
            ->expectsOutput('Route cache cleared!')
            ->expectsOutput('Routes cached successfully!')
            ->expectsOutput('Compiled views cleared!')
            ->assertExitCode(0);
    }
}
