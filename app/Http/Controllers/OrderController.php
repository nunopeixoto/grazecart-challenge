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
            'page' => 'numeric|min:1'
        ]);

        if ($validator->fails()) {
            abort(422, $validator->errors());
        }

        $orders = Http::grazecart()
            ->get('/orders', [
                'page' => $request->input()['page'] ?? 1
            ])->json();

        return response($orders, 200);
    }

    public function show(int $id)
    {
        $order = Http::grazecart()
            ->get("/orders/$id")
            ->json();

        return response($order, 200);
    }
}
