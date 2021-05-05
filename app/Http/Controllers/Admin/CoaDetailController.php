<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoaDetailController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve chart of accounts and chart of account's details.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $coaDetails = $response['data'];

        // Returning view of chart of account's page, also sending the response data.
        return view('admin.master-data.account-detail.index', compact('coas', 'coaDetails'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new chart of account's detail.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/coa-detail', [
            'coa_id' => $request->coa_id,
            'nama_rincian_akun' => $request->nama_rincian_akun
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('admin.coa-detail.index')->with('status', $response['message']);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving chart of account's detail data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating chart of account's detail.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/coa-detail/' . $id, [
            'coa_id' => $request->coa_id,
            'nama_rincian_akun' => $request->nama_rincian_akun
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('admin.coa-detail.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting chart of account's detail.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/coa-detail/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('admin.coa-detail.index')->with('status', $response['message']);
    }
}
