<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use Traits\ApiEndpoint;
    use Traits\AssertTraits;

    protected function tearDown(): void
    {
        $this->artisan('config:clear');
        parent::tearDown();
    }
}
