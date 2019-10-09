<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'LandingPageController')->name('landing-page');

Auth::routes([
    'reset'    => config('auth.enable_password_reset'),
    'verify'   => config('auth.enable_account_verification'),
    'register' => config('auth.enable_account_registration'),
]);

Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile', 'ProfileController@update')->name('profile.update');
    Route::put('password', 'PasswordController')->name('profile.password.update');
    Route::get('notifications', 'NotificationController')->name('notifications');

    /*
     * Impersonate
     */
    if (isImpersonateEnabled()) {
        Route::impersonate();
    }

    /*
     * User
     */
    Route::resource('users', 'UserController');

    /*
     * Audit Trail
     */
    Route::get('audit', 'AuditController@index')->name('audit.index');
    Route::get('audit/{audit}', 'AuditController@show')->name('audit.show');
});
