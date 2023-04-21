<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('sessions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $loginType = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $requestData = [    $loginType => request()->input('username'),    'password' => request()->input('password')];

        if (!auth()->attempt($requestData)) {
            throw ValidationException::withMessages([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        session()->regenerate();

        return redirect()->route('dashboard', app()->getLocale());
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('login.create', app()->getLocale());
    }
}
