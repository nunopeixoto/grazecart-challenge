<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('grazecart', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . config('grazecart.key')
            ])->baseUrl(config('grazecart.url'));
        });
    }
}
