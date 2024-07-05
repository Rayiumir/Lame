<?php

namespace Rayium\Lame\Http\Controllers\auth\email;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Rayium\Lame\Http\Requests\RegisterRequest;
use Rayium\Lame\Services\RegisterService;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Lame::auth.register');
    }

    public function store(RegisterService $registerService, RegisterRequest $request)
    {
        $user = $registerService->generateUser($request);
        auth()->loginUsingId($user->id);
        event(new Registered($user));
        return to_route('admin.index');
    }
}
