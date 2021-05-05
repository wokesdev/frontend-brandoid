<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CashPaymentController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve cash payments.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-payment');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $cashPayments = $response['data'];

        // Returning view of cash payment's page, also sending the response data.
        return view('user.transaction.cash-payment.index', compact('coas', 'cashPayments'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new cash payment.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/cash-payment', [
            'rincian_akun_id' => $request->rincian_akun,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-payment.index')->with('status', $response['message']);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving cash payment data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-payment/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating cash payment.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/cash-payment/' . $id, [
            'rincian_akun_id' => $request->rincian_akun,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-payment.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting cash payment.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/cash-payment/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.cash-payment.index')->with('status', $response['message']);
    }
}
