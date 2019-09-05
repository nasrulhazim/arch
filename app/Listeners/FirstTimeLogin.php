<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;

class FirstTimeLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param Login $event
     */
    public function handle(Attempting $event)
    {
        if (! isFirstTimeLoginCheckingEnabled()) {
            return;
        }

        $user = \App\Models\User::where('email', $event->credentials['email'])->first();

        if ($user->firstTimeLogin()) {
            throw new \App\Exceptions\FirstTimeLoginException();
        }
    }
}
