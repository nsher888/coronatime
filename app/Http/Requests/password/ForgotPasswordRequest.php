<?php

namespace App\Http\Requests\password;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}
