<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return $request->user();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // abort unless user have the permission to delete and the record to delete is not the person it self.
        abort_unless(auth()->user()->can('destroy-user') && $user->id != auth()->user()->id, 403);

        $user->delete();

        return response()->json([
            'message' => __('User successfully deleted.'),
        ]);
    }
}
