<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CashReceiptController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve cash receipts.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-receipt');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $cashReceipts = $response['data'];

        // Returning view of cash receipt's page, also sending the response data.
        return view('user.transaction.cash-receipt.index', compact('coas', 'cashReceipts'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new cash receipt.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/cash-receipt', [
            'rincian_akun_id' => $request->rincian_akun,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-receipt.index')->with('status', $response['message']);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving cash receipt data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-receipt/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating cash receipt.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/cash-receipt/' . $id, [
            'rincian_akun_id' => $request->rincian_akun,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-receipt.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting cash receipt.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/cash-receipt/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-receipt.index')->with('status', $response['message']);
    }
}
