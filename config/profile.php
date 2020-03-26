<?php

return [
    'providers' => [
        'address' => [
            'model' => \App\Models\Profile\Address::class,
            'type'  => 'addressable',
        ],
        'email' => [
            'model' => \App\Models\Profile\Email::class,
            'type'  => 'emailable',
        ],
        'bank' => [
            'model' => \CleaniqueCoders\Profile\Models\Bank::class,
            'type'  => 'bankable',
        ],
        'phone' => [
            'model' => \App\Models\Profile\Phone::class,
            'type'  => 'phoneable',
        ],
        'phoneType' => [
            'model' => \CleaniqueCoders\Profile\Models\PhoneType::class,
        ],
        'country' => [
            'model' => \CleaniqueCoders\Profile\Models\Country::class,
        ],
        'website' => [
            'model' => \App\Models\Profile\Website::class,
            'type'  => 'websiteable',
        ],
    ],
    'seeders' => [
        BankSeeder::class,
        CountrySeeder::class,
        PhoneTypeSeeder::class,
    ],
    'data' => [
        'phoneType' => [
            'Home',
            'Mobile',
            'Office',
            'Other',
            'Fax',
        ],
    ],
];
