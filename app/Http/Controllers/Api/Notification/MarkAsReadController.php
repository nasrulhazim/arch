<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkAsReadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();

        return response()->json([
            'message' => __('Notification successfully mark as read.'),
        ]);
    }
}
