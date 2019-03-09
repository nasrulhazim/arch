<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    use \App\Traits\SeedingProgressBar;

    public $seeders = [
        'seedUsers' => false,
    ];

    /**
     * Seed Users.
     */
    public function seedUsers()
    {
        $roles = collect(config('acl.roles'));

        $roles->each(function ($role) {
            $name = title_case($role);
            $email = $role . '@app.com';
            $password = bcrypt($role);

            $user = \App\Models\User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => $password,
            ]);

            event(new Registered($user));

            if (! $user->hasRole($role)) {
                $user->assignRole($role);
            }
        });
    }
}
