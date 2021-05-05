<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Checking whether user is already authenticated or no.
        $token = session('token');

        if (empty($token)) {
            // Redirecting to login page.
            return redirect('login');
        }

        // Returning the requested page.
        return $next($request);
    }
}
