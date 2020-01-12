<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;

class PasswordResetByAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordReset $event)
    {
        if ($event->user->is_password_reset_by_admin) {
            $event->user->is_password_reset_by_admin = false;
            $event->user->save();
        }
    }
}
