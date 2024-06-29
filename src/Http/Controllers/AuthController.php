<?php

namespace Rayium\Lame\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('Lame::auth');
    }
}
