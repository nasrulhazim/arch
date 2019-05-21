<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevelopmentSeeder extends Seeder
{
    use \App\Traits\Seeds\SeedingProgressBar;

    public $seeders = [
        'seedUsers' => false,
    ];

    /**
     * Seed Users.
     */
    public function seedUsers()
    {
        /**
         * Config Base.
         */
        $roles = collect(config('acl.roles'));

        $roles->each(function ($role) {
            $name = title_case($role);
            $email = $role . '@app.com';
            $password = Hash::make('password');

            $user = \App\Models\User::create([
                'name'              => $name,
                'email'             => $email,
                'password'          => $password,
                'email_verified_at' => now(),
            ]);

            event(new Registered($user));

            if (! $user->hasRole($role)) {
                $user->assignRole($role);
            }
        });
    }
}
