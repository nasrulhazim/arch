<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Profile
Breadcrumbs::for('profile.edit', function ($trail) {
    $trail->push('Profile', route('profile.edit'));
});

// Home > User
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('User', route('users.index'));
});

// Home > User > Create
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('home');
    $trail->push('User', route('users.create'));
});
