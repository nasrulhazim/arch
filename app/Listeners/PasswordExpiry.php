<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;

class PasswordExpiry
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
    public function handle(Attempting $event)
    {
        if (! passwordExpiryCheckingEnabled()) {
            return;
        }

        $user = \App\Models\User::where('email', $event->credentials['email'])->first();

        if (now()->greaterThan($user->password_expired_at)) {
            throw new \App\Exceptions\ExpiredPasswordException();
        }
    }
}
