<?php

namespace Rayium\Lame\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('Lame::admin.index');
    }
}
