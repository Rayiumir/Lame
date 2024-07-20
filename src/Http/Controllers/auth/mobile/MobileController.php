<?php

namespace Rayium\Lame\Http\Controllers\auth\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rayium\Lame\Rules\ValidMobile;

class MobileController extends Controller
{
    public function mobile(Request $request)
    {
        if($request->method() == 'GET')
        {
            return view('Lame::auth.mobile');
        }

        $request->validate([
            'mobile' => ['required', new ValidMobile()]
        ]);
    }
}
