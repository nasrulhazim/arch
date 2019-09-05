<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;

class IsPasswordResetByAdmin
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
     * @param Attempting $event
     */
    public function handle(Attempting $event)
    {
        $user = \App\Models\User::where('email', $event->credentials['email'])->firstOrFail();

        if ($user->is_password_reset_by_admin) {
            throw new \App\Exceptions\IsPasswordResetByAdminException();
        }
    }
}
