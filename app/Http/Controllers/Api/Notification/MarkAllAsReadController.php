<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkAllAsReadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        auth()->user()->unreadNotifications->markAsRead();

        return response()->json([
            'message' => __('All notifications successfully mark as read.'),
        ]);
    }
}
