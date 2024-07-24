<?php

namespace Rayium\Lame\Http\Controllers\auth\mobile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Rayium\Lame\Http\Notifications\OTPSms;
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

        try {

            $user = User::where('mobile', $request->mobile)->first();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');

            if ($user) {
                $user->update([
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);
            } else {
                $user = User::Create([
                    'mobile' => $request->mobile,
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);
            }
            Notification::send($user, new OTPSms($OTPCode));
//            $user->notify(new OTPSms($OTPCode));

            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }

    public function checkOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'login_token' => 'required'
        ]);

        try {
            $user = User::where('login_token', $request->login_token)->firstOrFail();

            if ($user->otp == $request->otp) {
                auth()->login($user, $remember = true);
                return response(['ورود با موفقیت انجام شد'], 200);
            } else {
                return response(['errors' => ['otp' => ['کد تاییدیه نادرست است']]], 422);
            }
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }
}
