<?php

use Faker\Generator as Faker;

$factory->define(\CleaniqueCoders\Profile\Models\Email::class, function (Faker $faker) {
    return [
        'email' => $faker->companyEmail,
    ];
});
