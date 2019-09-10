<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_acl_config_file()
    {
        $this->assertConfigFileExist('acl');
    }

    /** @test */
    public function it_has_acl_config_key()
    {
        $this->assertConfigKeyExist('acl');
    }

    /** @test */
    public function it_has_roles_config_key()
    {
        $this->assertConfigKeyExist('acl.roles');
    }

    /** @test */
    public function it_has_preseed_roles()
    {
        collect(collect(config('acl'))->get('roles'))->each(function ($role) {
            config('permission.models.role')::updateOrCreate(['name' => $role]);
        });

        $data = [
            'superadmin',
            'admin',
            'user',
        ];
        foreach ($data as $datum) {
            $this->assertDatabaseHas('roles', ['name' => $datum]);
        }
    }
}
