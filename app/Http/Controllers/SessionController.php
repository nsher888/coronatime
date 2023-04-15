<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $loginType = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $requestData = [    $loginType => request()->input('username'),    'password' => request()->input('password')];

        if (!auth()->attempt($requestData)) {
            throw ValidationException::withMessages([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }

        session()->regenerate();

        return redirect()->route('home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login.create');
    }
}
