<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ClientService;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ClientService::class, function ($app) {
            return new ClientService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
