<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IsBanned
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
            return redirect()->route('login');
        }

        // Retrieving user profile from API using session.
        $user = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/me');

        // Checking whether user is banned or no.
        if ($user['message'] == 'Banned.') {
            // Removing auth token on session.
            $removeToken = session()->forget('token');
        }

        // Returning the requested page.
        return $next($request);
    }
}
