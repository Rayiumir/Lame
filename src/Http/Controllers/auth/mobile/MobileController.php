<?php

namespace Rayium\Lame\Http\Controllers\auth\mobile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rayium\Lame\Http\Notifications\OTPSMS;

class MobileController extends Controller
{
    public function mobile(Request $request)
    {
        if($request->method() == 'GET')
        {
            return view('Lame::auth.mobile');
        }
    }
}
