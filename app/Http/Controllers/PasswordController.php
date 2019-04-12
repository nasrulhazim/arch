<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        \App\Models\User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->input('password')),
        ]);

        alert()->success(__('Password updated.'));

        return redirect()->route('profile.update');
    }
}
