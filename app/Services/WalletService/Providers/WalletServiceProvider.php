<?php

namespace App\Services\WalletService\Providers;

use App\Services\WalletService\Repository\V1\Admin\Transaction\TransactionInterface;
use App\Services\WalletService\Repository\V1\Admin\Transaction\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TransactionInterface::class, TransactionRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }
}
