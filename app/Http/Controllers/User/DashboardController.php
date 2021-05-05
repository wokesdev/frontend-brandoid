<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Returning view of user dashboard page.
        return view('user.dashboard');
    }

    public function purchaseCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total purchases by user.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/purchase-count');

        // Getting the response from API.
        $purchases = $response['data'];

        // Returning the response to AJAX request.
        return response($purchases);
    }

    public function saleCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total sales by user.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/sale-count');

        // Getting the response from API.
        $sales = $response['data'];

        // Returning the response to AJAX request.
        return response($sales);
    }

    public function cashPaymentCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total cash payments by user.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-payment-count');

        // Getting the response from API.
        $cashPayments = $response['data'];

        // Returning the response to AJAX request.
        return response($cashPayments);
    }

    public function cashReceiptCount()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending request to API for counting total cash receipts by user.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/cash-receipt-count');

        // Getting the response from API.
        $cashReceipts = $response['data'];

        // Returning the response to AJAX request.
        return response($cashReceipts);
    }
}
