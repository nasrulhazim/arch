<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use \App\Traits\Seeds\SeedingProgressBar;

    public $seeders = [
        RolesAndPermissionsSeeder::class => true,
    ];
}
