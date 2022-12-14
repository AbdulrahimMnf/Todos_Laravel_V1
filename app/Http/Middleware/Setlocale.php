<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Stevebauman\Location\Facades\Location;

class Setlocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $currentUserInfo = Location::get('176.240.97.123');
        switch ($currentUserInfo->countryName) {
            case 'Turkey':
                URL::defaults(['locale' => 'tr']);
                break;
            case 'Egypt':
                URL::defaults(['locale' => 'ar']);
                break;
            default:
                URL::defaults(['locale' => 'en']);
                break;
        }
        if (in_array($request->segment(1), ['ar', 'en', 'tr'])) App::setLocale($request->segment(1));

        return $next($request);
    }
}
