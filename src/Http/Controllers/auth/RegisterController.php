<?php

namespace Rayium\Lame\Http\Controllers\auth;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Lame::auth.register');
    }
}
