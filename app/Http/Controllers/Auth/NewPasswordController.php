<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class NewPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('auth.passwords.create');
    }
}
