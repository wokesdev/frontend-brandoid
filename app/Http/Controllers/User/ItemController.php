<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve items.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/item');

        // Getting the response from API.
        $items = $response['data'];

        // Returning view of item's page, also sending the response data.
        return view('user.master-data.item.index', compact('items'));
    }

    public function getItem()
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API to retrieve items.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/item');

        // Getting the response from API.
        $items = $response['data'];

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function store(Request $request)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending POST request to API for creating new item.
        $response = Http::withToken($token)->post('https://api.jujutsu.xyz/api/v1/item', [
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.item.index')->with('status', $response['message']);
    }

    public function edit($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending GET request to API for retrieving item data.
        $response = Http::withToken($token)->get('https://api.jujutsu.xyz/api/v1/item/' . $id);

        // Returning the response to AJAX request.
        return response($response['data']);
    }

    public function update(Request $request, $id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending PUT request to API for updating item.
        $response = Http::withToken($token)->put('https://api.jujutsu.xyz/api/v1/item/' . $id, [
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok
        ]);

        // Returning the view along with the response's message.
        return redirect()->route('user.item.index')->with('status', $response['message']);
    }

    public function destroy($id)
    {
        // Retrieving token from session.
        $token = session('token');

        // Sending DELETE request to API for deleting item.
        $response = Http::withToken($token)->delete('https://api.jujutsu.xyz/api/v1/item/' . $id);

        // Returning the view along with the response's message.
        return redirect()->route('user.item.index')->with('status', $response['message']);
    }
}
