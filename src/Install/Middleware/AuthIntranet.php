<?php

namespace App\Http\Middleware;

use Closure;

class AuthIntranet
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
        if (auth('intranet')->check()) {
            return $next($request);
        }
        return redirect()->route('intranet.auth.show');
    }
}
