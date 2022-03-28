<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request;

class GrazeCartHttpMacroTest extends TestCase
{
    public function test_graze_cart_macro()
    {
        Http::fake();
        Http::grazecart()->get("/orders");

        Http::assertSent(function (Request $request) {
            return  $request->hasHeader('Accept', 'application/json') &&
                $request->hasHeader('Authorization', 'Bearer ' . config('grazecart.key')) &&
                $request->url() == 'https://paramount.staging.grazecart.io/api/v1/orders';
        });
    }
}
