<?php

use Faker\Generator as Faker;

$factory->define(\CleaniqueCoders\Profile\Models\Website::class, function (Faker $faker) {
    return [
        'url'  => $faker->url,
        'name' => $faker->name,
    ];
});
