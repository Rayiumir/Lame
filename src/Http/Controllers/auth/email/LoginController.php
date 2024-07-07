<?php

namespace Rayium\Lame\Http\Controllers\auth\email;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Rayium\Lame\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('Lame::auth.login');
    }

    public function store(LoginRequest $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return to_route('admin.index');
        }
    }
}
