<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class APILocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $local = ($request->hasHeader('lang')) ? (strlen($request->header('lang')) > 0 ?
            $request->header('lang') : 'en') : 'en';
        if ($request->get('lang')) {
            $local = $request->get('lang');
        } elseif (Session::has('lang')) {
            $local = Session::get('lang');
        }
        Session::put($local);
        App::setLocale($local);
        return $next($request);
    }
}
