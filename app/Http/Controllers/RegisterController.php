<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('verification.notice', ['language' => app()->getLocale()]);
    }
}
