<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $acl         = collect(config('acl'));
        $roles       = collect($acl->get('roles'));
        $permissions = collect($acl->get('permissions'));
        $actions     = collect($acl->get('actions'));
        $matrices    = collect($acl->get('matrices'));

        $roles->each(function ($role) {
            config('permission.models.role')::updateOrCreate(['name' => $role]);
        });

        $permissions->each(function ($permission) use ($actions) {
            $actions->each(function ($action) use ($permission) {
                config('permission.models.permission')::updateOrCreate([
                    'name' => Str::kebab($action . '-' . $permission),
                ]);
            });
        });

        foreach ($matrices as $permission => $roles) {
            foreach ($roles as $role => $actions) {
                foreach ($actions as $action) {
                    config('permission.models.role')::where('name', $role)
                        ->first()
                        ->givePermissionTo(Str::kebab($action . '-' . $permission));
                }
            }
        }
    }
}
