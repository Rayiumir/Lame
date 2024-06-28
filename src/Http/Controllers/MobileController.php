<?php

namespace Rayium\Lame\Http\Controllers;

use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    public function index()
    {
        return view('Lame::auth');
    }
}
