<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // restrict access by IP address
        Filament::serving(function () {
            $allowed = [
                // add your own IP addresses here
                '123.123.123.123',
                '::1',
                '127.0.0.1',
            ];

            if (! in_array(Request::ip(), $allowed)) {
                abort(403);
            }
        });
    }
}
