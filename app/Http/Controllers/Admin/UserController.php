<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve users.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/user');

        // Getting the response from API.
        $users = $response['data'];

        // Returning view of chart of account's page, also sending the response data.
        return view('admin.master-data.user.index', compact('users'));
    }

    public function makeAdmin(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for giving admin privilege to user.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/user-make-admin/' . $id);

        // Removing auth token on session.
        $removeToken = session()->forget('token');

        // Returning the view along with the response's message.
        return redirect()->route('admin.user.index')->with('status', $response['message']);
    }

    public function removeAdmin(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for removing admin privilege from user.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/user-remove-admin/' . $id);

        // Removing auth token on session.
        $removeToken = session()->forget('token');

        // Returning the view along with the response's message.
        return redirect()->route('admin.user.index')->with('status', $response['message']);
    }

    public function banUser(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for banning user.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/user-ban-user/' . $id);

        // Removing auth token on session.
        $removeToken = session()->forget('token');

        // Returning the view along with the response's message.
        return redirect()->route('admin.user.index')->with('status', $response['message']);
    }

    public function unbanUser(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for unbanning user.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/user-unban-user/' . $id);

        // Removing auth token on session.
        $removeToken = session()->forget('token');

        // Returning the view along with the response's message.
        return redirect()->route('admin.user.index')->with('status', $response['message']);
    }
}
