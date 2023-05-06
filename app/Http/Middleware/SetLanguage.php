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
    protected $defaultLanguage = 'en';

    public function handle(Request $request, Closure $next): Response
    {
        $language = $request->language;

        if (empty($language)) {
            $language = $this->defaultLanguage;
        } elseif (!in_array($language, $this->allowedLanguages)) {
            return Redirect::back();
        }

        app()->setLocale($language);

        return $next($request);
    }
}
