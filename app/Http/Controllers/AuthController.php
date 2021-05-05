<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function loginView()
    {
        // Retrieving token from session.
        $token = session('token');

        // Checking whether user is already authenticated or no.
        if (empty($token)) {
            // Returning view of login page.
            return view('auth.login');
        }

        // Retrieving user profile from API using token from session.
        $user = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/me');

        // Checking whether user is admin or no.
        if ($user['data']['is_admin'] == 1) {
            // Redirecting to admin dashboard page.
            return redirect()->route('admin.dashboard');
        }

        // Redirecting to user dashboard page.
        return redirect()->route('user.dashboard');
    }

    public function registerView()
    {
        // Retrieving token from session.
        $token = session('token');

        // Checking whether user is already authenticated or no.
        if (empty($token)) {
            // Returning view of register page.
            return view('auth.register');
        }

        // Retrieving user profile from API using token from session.
        $user = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/me');

        // Checking whether user is admin or no.
        if ($user['data']['is_admin'] == 1) {
            // Redirecting to admin dashboard page.
            return redirect()->route('admin.dashboard');
        }

        // Redirecting to user dashboard page.
        return redirect()->route('user.dashboard');
    }

    public function login(Request $request)
    {
        // Sending request to API for login.
        $response = Http::post('https://api.jujutsu.xyz/api/v1/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Checking whether the response is success or failed.
        if ($response->ok()) {
            // Inserting auth token on a variable.
            $token = $response['data']['token'];

            // Storing auth token on session.
            $storeToken = session(['token' => $token]);

            // Retrieving user profile from API using auth token.
            $user = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/me');

            // Checking whether user is admin or no.
            if ($user['data']['is_admin'] == 1) {
                // Redirecting to admin dashboard page.
                return redirect()->route('admin.dashboard');
            }

            // Redirecting to user dashboard page.
            return redirect()->route('user.dashboard');;
        }

        else if ($response->failed()) {
            // Redirecting to login page.
            return redirect()->route('login')->with('status', $response['message']);;
        }
    }

    public function register(Request $request)
    {
        // Sending request to API for register.
        $response = Http::post('https://api.jujutsu.xyz/api/v1/auth/register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);

        // Checking whether the response is success or failed.
        if ($response->ok()) {
            // Inserting auth token on a variable.
            $token = $response['data']['token'];

            // Storing auth token on session.
            $storeToken = session(['token' => $token]);

            // Redirecting to user dashboard page.
            return redirect()->route('user.dashboard');
        }

        else if ($response->failed()) {
            // Redirecting to login page.
            return redirect()->route('register')->with('status', $response['message']);
        }
    }

    public function logout()
    {
        // Retrieving auth token variable from session.
        $token = session('token');

        // Sending request to API for logout.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/auth/logout');

        // Removing auth token on session.
        $removeToken = session()->forget('token');

        // Redirecting to login page.
        return redirect()->route('login');
    }
}
