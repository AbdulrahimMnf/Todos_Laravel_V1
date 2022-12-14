<?php

namespace App\Http\Middleware;

use App\Events\LogEvent;
use App\Models\Log;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogMiddleware
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
        if (Auth::check()) {
            event(
                new LogEvent(
                        [
                            'method'  => $request->method(),
                            'url'     => $request->url(),
                            'user_id' => Auth::id(),
                            'request' => $request,
                        ]
                    )
            );
        }
        return $next($request);
    }
}
