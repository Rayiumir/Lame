<?php

namespace Rayium\Lame\Http\Controllers\auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('Lame::auth.login');
    }
}
