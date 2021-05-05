<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Returning view of admin dashboard page.
        return view('admin.dashboard');
    }

    public function userCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total users.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/user-count');

        // Getting the response from API.
        $users = $response['data'];

        // Returning the response to AJAX request.
        return response($users);
    }

    public function adminCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total admins.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/admin-count');

        // Getting the response from API.
        $admins = $response['data'];

        // Returning the response to AJAX request.
        return response($admins);
    }

    public function bannedCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total banned users.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/banned-count');

        // Getting the response from API.
        $banneds = $response['data'];

        // Returning the response to AJAX request.
        return response($banneds);
    }
}
