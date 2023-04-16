<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.reset-password', ['token' => $request->token, 'email' => $request->email]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('verification.notice')->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => trans($status),
        ]);
    }

    public function updatePassword(Request $request)
    {


        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:3|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );


        return $status === Password::PASSWORD_RESET
            ? redirect()->route('password.success')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
