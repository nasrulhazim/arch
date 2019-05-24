<?php

return [
    'roles' => [
        'Superadmin',
        'Admin',
        'User',
    ],
    'permissions' => [
        'administration',
        'log',
        'user',
        'role',
        'permission',
        'setting',
        'profile',
        'audit',
    ],
    'actions' => [
        'see-all', 'see-one', 'create', 'edit', 'update', 'destroy',
    ],
    'matrices' => [
        'administration' => [
            'Superadmin' => ['see-all', 'see-one'],
        ],
        'log' => [
            'Superadmin' => ['see-all', 'see-one'],
        ],
        'user' => [
            'Superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'role' => [
            'Superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'permission' => [
            'Superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'setting' => [
            'Superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'profile' => [
            'Superadmin' => ['see-all', 'see-one', 'edit', 'update'],
            'User'       => ['see-all', 'see-one', 'edit', 'update'],
        ],
        'audit' => [
            'Superadmin' => ['see-all', 'see-one'],
        ],
    ],
];
