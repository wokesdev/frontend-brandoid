<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade as PDF;

class GeneralEntryController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve general entries.
        $responseCoa = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/coa-detail');
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/general-entry');

        // Getting the response from API.
        $coas = $responseCoa['data'];
        $generalEntries = $response['data'];

        // Returning view of general entries' page, also sending the response data.
        return view('user.report.general-entry.index', compact('coas', 'generalEntries'));
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new general entry.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/general-entry', [
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'rincian_akun_debit_id' => $request->rincian_akun_debit,
            'rincian_akun_kredit_id' => $request->rincian_akun_kredit,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.general-entry.index')->with('status', $response['message']);
    }

    public function show($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve selected general entry.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/general-entry/' . $id);

        // Getting the response from API.
        $generalEntry = $response['data'];
        $generalEntryDetails = $response['data']['general_entry_details'];

        // Making tbody for details' table.
        $table = "<div>";
        foreach ($generalEntryDetails as $generalEntryDetail) {
            $table .= "<tr>";
                $table .= "<td>" . $generalEntryDetail['coa_detail']['nama_rincian_akun'] . "</td>";
                $table .= "<td>" . $generalEntryDetail['debit'] . "</td>";
                $table .= "<td>" . $generalEntryDetail['kredit'] . "</td>";
            $table .= "</tr>";
        }
        $table .= "</div>";

        // Returning the response to AJAX request.
        return response([
            'tbody' => $table,
            'general_entry' => $generalEntry
        ]);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving general entry data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/general-entry/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating general entry.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/general-entry/' . $id, [
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'rincian_akun_debit_id' => $request->rincian_akun_debit,
            'rincian_akun_kredit_id' => $request->rincian_akun_kredit,
            'nominal' => $request->nominal
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.general-entry.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting general entry.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/general-entry/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.general-entry.index')->with('status', $response['message']);
    }

    public function print(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API to retrieve general entries.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/general-entry-filter', [
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ]);

        // Getting the response from API.
        $generalEntryDetails = $response['data']['general_entry_details'];
        $sumDebit = $response['data']['sum_debit'];
        $sumKredit = $response['data']['sum_kredit'];

        // Creating the PDF report for general entries.
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $pdf = PDF::loadView('user.report.general-entry.pdf', compact('generalEntryDetails', 'sumDebit', 'sumKredit', 'fromDate', 'toDate'));
        return $pdf->download('Jurnal Umum - BrandoID - ' . $fromDate . ' s/d ' . $toDate . '.pdf');
    }
}
