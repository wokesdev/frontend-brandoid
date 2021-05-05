<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve purchases.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/purchase');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $purchases = $response['data'];

        // Returning view of purchase's page, also sending the response data.
        return view('user.transaction.purchase.index', compact('coas', 'purchases'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new purchase.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/purchase', [
            'rincian_akun_id' => $request->rincian_akun,
            'rincian_akun_pembayaran_id' => $request->rincian_akun_pembayaran,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'barang_id' => $request->barang,
            'kuantitas' => $request->kuantitas,
            'harga_satuan' => $request->harga_satuan
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.purchase.index')->with('status', $response['message']);
    }

    public function show($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve selected purchase.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/purchase/' . $id);

        // Getting the response from API.
        $purchase = $response['data'];
        $purchaseDetails = $response['data']['purchase_details'];

        // Making tbody for details' table.
        $table = "<div>";
        foreach ($purchaseDetails as $purchaseDetail) {
            $table .= "<tr>";
                $table .= "<td>" . $purchaseDetail['item']['nama_barang'] . "</td>";
                $table .= "<td>" . $purchaseDetail['kuantitas'] . "</td>";
                $table .= "<td>" . $purchaseDetail['harga_satuan'] . "</td>";
                $table .= "<td>" . $purchaseDetail['subtotal'] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</div>";

        // Returning the response to AJAX request.
        return response([
            'tbody' => $table,
            'purchase' => $purchase
        ]);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving purchase data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/purchase/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating purchase.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/purchase/' . $id, [
            'rincian_akun_id' => $request->rincian_akun,
            'rincian_akun_pembayaran_id' => $request->rincian_akun_pembayaran,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.purchase.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting purchase.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/purchase/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.purchase.index')->with('status', $response['message']);
    }
}
