<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supported = ['en', 'es'];
        $sessionLocale = session('locale');

        if ($sessionLocale && in_array($sessionLocale, $supported, true)) {
            App::setLocale($sessionLocale);
        }

        return $next($request);
    }
}
