<?php

// Proposal
// Route::dt('users'); // Route::get('users', 'UserDatatable')->name('users');

Route::get('users', 'UserDatatable')->name('users');
Route::get('audits', 'AuditDatatable')->name('audits');
