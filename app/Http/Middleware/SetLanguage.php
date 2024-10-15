<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('language')) {
            App::setLocale($request->language);
        }
        return $next($request);
        //return $next($request);
    }
}
