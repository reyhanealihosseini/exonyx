<?php

namespace App\Services\CryptocurrencyService\Providers;

use App\Services\CryptocurrencyService\Repository\V1\Admin\Cryptocurrency\CryptocurrencyInterface;
use App\Services\CryptocurrencyService\Repository\V1\Admin\Cryptocurrency\CryptocurrencyRepository;
use Illuminate\Support\ServiceProvider;

class CryptocurrencyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CryptocurrencyInterface::class, CryptocurrencyRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
