<?php

use Faker\Generator as Faker;

$factory->define(\CleaniqueCoders\Profile\Models\Phone::class, function (Faker $faker) {
    return [
        'phone_type_id' => $faker->randomElement([1, 2, 3, 4]),
        'phone_number'  => $faker->phoneNumber,
    ];
});
