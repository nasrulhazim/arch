<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', 'UserController@profile')->name('user.profile');
    Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');

    /*
     * Notifications
     */
    Route::put('notifications/{id}/mark-as-read', 'Notification\MarkAsReadController')->name('notification.mark.as.read');
    Route::put('notifications/mark-all-as-read', 'Notification\MarkAllAsReadController')->name('notification.mark.all.as.read');
});
