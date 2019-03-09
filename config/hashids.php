<?php

return [
    'salt'     => env('HASHID_SALT', env('APP_KEY')),
    'length'   => env('HASHID_LENGTH', 12),
    'alphabet' => env('HASHID_ALPHABET', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'),
];
