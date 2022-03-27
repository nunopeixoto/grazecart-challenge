<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Validator;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'page' => 'numeric'
        ]);

        if ($validator->fails()) {
            abort(422, $validator->errors());
        }

        $orders = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('grazecart.key')
        ])
        ->get('https://paramount.staging.grazecart.io/api/v1/orders', [
            'page' => $validated['page'] ?? 1
        ])
        ->json();

        return response($orders, 200);
    }

    public function show(int $id)
    {
        $orders = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . config('grazecart.key')
        ])
        ->get("https://paramount.staging.grazecart.io/api/v1/orders/$id")
        ->json();

        return response($orders, 200);
    }
}
