<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelperTest extends TestCase
{
    public $helpers = [
        /**
         * acl
         */
        'roles',
        'permissions',
        'role',
        'permission',

        /**
         * global
         */
        'isProduction',
        'isTesting',
        'locales',
        'gravatar',
        'user',
        
        /**
         * navigation
         */
        'isActiveNav',
    ];

    /** @test */
    public function it_has_all_helpers_for_application()
    {
        foreach ($this->helpers as $helper) {
            $this->assertHelperExist($helper);
        }
    }
}
