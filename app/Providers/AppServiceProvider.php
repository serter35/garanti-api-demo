<?php

namespace App\Providers;

use App\Contract\IClient;
use App\Contract\IOrderRepository;
use App\Contract\ITerminalRepository;
use App\Repositories\OrderEloquentRepository;
use App\Repositories\TerminalEloquentRepository;
use App\Services\Payment\Garanti\Infrastructure\Client;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IClient::class, Client::class);
        $this->app->bind(IOrderRepository::class, OrderEloquentRepository::class);
        $this->app->bind(ITerminalRepository::class, TerminalEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
