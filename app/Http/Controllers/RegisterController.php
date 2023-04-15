<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(StoreUserRequest $request)
    {
        $attributes = $request->validated();

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('verification.notice');
    }
}
