<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade as PDF;

class IncomeStatementController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve general entries.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/income-statement');

        // Getting the response from API.
        // $incomeStatements = $response['data'];

        return $response;

        // Returning view of general entries' page, also sending the response data.
        return view('user.report.income-statement.index', compact('incomeStatements'));
    }

    public function print(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API to retrieve income statements.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/income-statement-filter', [
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ]);

        // Getting the response from API.
        $data = $response['data'];
        $penjualanGeDetails = $response['data']['penjualan_ge_details'];
        $pendapatanLainGeDetails = $response['data']['pendapatan_lain_ge_details'];
        $biayaOperasionalGeDetails = $response['data']['biaya_operasional_ge_details'];
        $biayaLainGeDetails = $response['data']['biaya_lain_ge_details'];

        // Creating the PDF report for income statements.
        $fromDate = $request->from_date;
        $toDate = $request->to_date;

        $pdf = PDF::loadView('user.report.income-statement.pdf', compact(
            'data',
            'penjualanGeDetails',
            'pendapatanLainGeDetails',
            'biayaOperasionalGeDetails',
            'biayaLainGeDetails',
            'fromDate',
            'toDate'
        ));
        return $pdf->download('Laporan Laba/Rugi - BrandoID - ' . $fromDate . ' s/d ' . $toDate . '.pdf');
    }
}
