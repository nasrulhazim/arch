<?php

namespace App\Providers;

use App\Listeners\AccountExpiry;
use App\Listeners\FirstTimeLogin;
use App\Listeners\IsPasswordResetByAdmin;
use App\Listeners\PasswordExpiry;
use App\Listeners\PasswordResetByAdmin;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Attempting::class => [
            AccountExpiry::class,
            PasswordExpiry::class,
            FirstTimeLogin::class,
            IsPasswordResetByAdmin::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PasswordReset::class => [
            PasswordResetByAdmin::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
