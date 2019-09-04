<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PermissionTest extends TestCase
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
    public function it_has_permissions_config_key()
    {
        $this->assertConfigKeyExist('acl.permissions');
    }

    /** @test */
    public function it_has_preseed_permissions()
    {
        app()['cache']->forget('spatie.permission.cache');
        $acl         = collect(config('acl'));
        $permissions = collect($acl->get('permissions'));
        $actions     = collect($acl->get('actions'));

        $permissions->each(function ($permission) use ($actions) {
            $actions->each(function ($action) use ($permission) {
                config('permission.models.permission')::updateOrCreate(['name' => Str::kebab($action . ' ' . $permission)]);
            });
        });

        $data = [
            'log',
            'user',
            'role',
            'permission',
            'setting',
            'profile',
        ];
        foreach ($data as $datum) {
            $actions->each(function ($action) use ($datum) {
                $this->assertDatabaseHas('permissions', ['name' => Str::kebab($action . ' ' . $datum)]);
            });
        }
    }
}
