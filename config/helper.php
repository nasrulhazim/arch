<?php


return [
    'sequence_length' => env('HELPER_SEQUENCE_LENGTH', 6),
    'abbrv'           => [
        'remove_vowels'           => ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', ' '],
        'remove_non_alphanumeric' => true,
        'to_uppercase'            => true,
        'unique_characters'       => true,
    ],
    'models' => [
        'user' => \App\User::class,
    ],
];
