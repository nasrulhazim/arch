<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, Traits\ApiEndpoint, Traits\AssertTraits;

    protected function tearDown(): void
    {
        $this->artisan('config:clear');
        parent::tearDown();
    }
}
