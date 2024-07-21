<?php

namespace Rayium\Lame\Http\Controllers\auth\mobile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Rayium\Lame\Http\Notifications\OTPSMS;
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
                    'login_token' => $loginToken
                ]);
            } else {
                $user = User::query()->create([
                    'mobile' => $request->mobile,
                    'login_token' => $loginToken
                ]);
            }
            $user->notify(new OTPSMS($OTPCode));

            return response(['login_token' => $loginToken], 200);
        } catch (\Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }
}
