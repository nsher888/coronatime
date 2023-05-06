<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    protected $allowedLanguages = ['en', 'ka'];

    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->language;

        if (!in_array($language, $this->allowedLanguages)) {
            return Redirect::back();
        }

        app()->setLocale($language);

        return $next($request);
    }
}
