<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoaController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve chart of accounts.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa');

        // Getting the response from API.
        $coas = $response['data'];

        // Returning view of chart of account's page, also sending the response data.
        return view('user.master-data.account.index', compact('coas'));
    }

    public function show($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve selected chart of accounts.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa/' . $id);

        // Getting the response from API.
        $coa = $response['data'];
        $coaDetails = $response['data']['coa_details'];

        // Making tbody for details' table.
        $table = "<div>";
        foreach ($coaDetails as $coaDetail) {
            $table .= "<tr>";
                $table .= "<td>" . $coaDetail['nomor_rincian_akun'] . "</td>";
                $table .= "<td>" . $coaDetail['nama_rincian_akun'] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</div>";

        // Returning the response to AJAX request.
        return response([
            'tbody' => $table,
            'coa' => $coa
        ]);
    }
}
