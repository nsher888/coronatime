<?php

namespace App\Http\Controllers;

use App\Http\Requests\password\ForgotPasswordRequest;
use App\Http\Requests\password\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    public function store(ForgotPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('verification.notice', app()->getLocale())->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))->withErrors([
            'email' => trans($status),
        ]);
    }

    public function updatePassword(ResetPasswordRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ]);

                $user->save();

                event(new PasswordReset($user));
            }
        );


        return $status === Password::PASSWORD_RESET
            ? redirect()->route('password.success', app()->getLocale())->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
