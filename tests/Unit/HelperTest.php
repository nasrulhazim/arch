<?php

namespace Tests\Unit;

use Tests\TestCase;

class HelperTest extends TestCase
{
    public $helpers = [
        /*
         * acl
         */
        'roles',
        'permissions',
        'role',
        'permission',

        /*
         * auth
         */
        'accountExpiryCheckingEnabled',
        'passwordExpiryCheckingEnabled',
        'isFirstTimeLoginCheckingEnabled',

        /*
         * env
         */
        'isProduction',
        'isTesting',

        /*
         * global
         */
        'isImpersonateEnabled',
        'isMailEnabled',
        'locales',
        'gravatar',
        'user',

        /*
         * navigation
         */
        'isActiveNav',

        /*
         * str
         */
        'classNameToTitleCase',
    ];

    /** @test */
    public function it_has_all_helpers_for_application()
    {
        foreach ($this->helpers as $helper) {
            $this->assertHelperExist($helper);
        }
    }

    /** @test */
    public function classNameToTitleCase_can_cast_class_name_to_title_case()
    {
        $data = [
            \App\Models\User::class        => 'User',
            \App\Models\UserProfile::class => 'User Profile',
            \App\Models\UserAddress::class => 'User Address',
        ];
        foreach ($data as $class => $expected) {
            $this->assertEquals($expected, classNameToTitleCase($class));
        }
    }
}
