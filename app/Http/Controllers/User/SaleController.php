<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve sales.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/sale');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $sales = $response['data'];

        // Returning view of sale's page, also sending the response data.
        return view('user.transaction.sale.index', compact('coas', 'sales'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new sale.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/sale', [
            'rincian_akun_id' => $request->rincian_akun,
            'rincian_akun_pembayaran_id' => $request->rincian_akun_pembayaran,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'barang_id' => $request->barang,
            'kuantitas' => $request->kuantitas,
            'harga_satuan' => $request->harga_satuan
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.sale.index')->with('status', $response['message']);
    }

    public function show($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve selected sale.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/sale/' . $id);

        // Getting the response from API.
        $sale = $response['data'];
        $saleDetails = $response['data']['sale_details'];

        // Making tbody for details' table.
        $table = "<div>";
        foreach ($saleDetails as $saleDetail) {
            $table .= "<tr>";
                $table .= "<td>" . $saleDetail['item']['nama_barang'] . "</td>";
                $table .= "<td>" . $saleDetail['kuantitas'] . "</td>";
                $table .= "<td>" . $saleDetail['harga_satuan'] . "</td>";
                $table .= "<td>" . $saleDetail['subtotal'] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</div>";

        // Returning the response to AJAX request.
        return response([
            'tbody' => $table,
            'sale' => $sale
        ]);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving sale data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/sale/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating sale.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/sale/' . $id, [
            'rincian_akun_id' => $request->rincian_akun,
            'rincian_akun_pembayaran_id' => $request->rincian_akun_pembayaran,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.sale.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting sale.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/sale/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.sale.index')->with('status', $response['message']);
    }
}
