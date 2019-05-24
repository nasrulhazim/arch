<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

// Profile
Breadcrumbs::for('profile.edit', function ($trail) {
    $trail->push(__('Profile'), route('profile.edit'));
});

// Home > User
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User'), route('users.index'));
});

// Home > User > Create
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User'), route('users.create'));
});

// Home > User > Edit
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push(__('Edit'), route('users.edit', $user));
});

// Home > User > Details
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push(__('Details'), route('users.show', $user));
});


// Home > Audit Trail
Breadcrumbs::for('audit.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Audit Trail'), route('audit.index'));
});

// Home > Audti Trail > Details
Breadcrumbs::for('audit.show', function ($trail, $audit) {
    $trail->parent('audit.index');
    $trail->push(__('Details'), route('audit.show', $audit));
});
