<?php

return [
    'roles' => [
        'superadmin',
        'admin',
        'user',
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
            'superadmin' => ['see-all', 'see-one'],
        ],
        'log' => [
            'superadmin' => ['see-all', 'see-one'],
        ],
        'user' => [
            'superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'role' => [
            'superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'permission' => [
            'superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'setting' => [
            'superadmin' => ['see-all', 'see-one', 'create', 'edit', 'update', 'destroy'],
        ],
        'profile' => [
            'superadmin' => ['see-all', 'see-one', 'edit', 'update'],
            'user'       => ['see-all', 'see-one', 'edit', 'update'],
        ],
        'audit' => [
            'superadmin' => ['see-all', 'see-one'],
        ],
    ],
];
