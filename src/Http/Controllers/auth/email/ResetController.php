<?php

namespace Rayium\Lame\Http\Controllers\auth\email;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Rayium\Lame\Http\Requests\PasswordRecoveryRequest;
use Rayium\Lame\Http\Requests\PasswordUpdateRequest;

class ResetController extends Controller
{
    public function view()
    {
        return view('Lame::auth.password.update');
    }

    public function SendEmail(PasswordRecoveryRequest $request)
    {
        $reset = Password::sendResetLink($request->only('email'));
        return $reset === Password::RESET_LINK_SENT ?
            back()->with(['message' => 'پیوند بازیابی رمز عبور با موفقیت به ایمیل شما ارسال شد.'])
            :
            back()->withErrors(['error' => 'یک مشکلی در سیستم به وجود آمده است, لطفا دوباره تلاش کنید.']);
    }

    public function reset(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        return view('Lame::auth.password.reset', compact(['token', 'email']));
    }

    public function update(PasswordUpdateRequest $request)
    {
        $reset = Password::reset(
            $request->only('token', 'email', 'password', 'password_confirmation'),
            static function ($user, $password)
            {
                $user->forceFill(['password' => bcrypt($password)])->setRememberToken(Str::random(60));
                event(new ResetPassword($user));
                $user->save();
            }
        );

        return $reset === Password::PASSWORD_RESET ? to_route('login')
            ->with(['message' => 'رمز عبور شما با موفقیت تغییر کرد.'])
            : back()->withErrors(['error' => 'شکلی در سیستم به وجود آمد است, لطفا دوباره تلاش کنید.']);
    }
}
