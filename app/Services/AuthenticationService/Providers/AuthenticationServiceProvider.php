<?php

namespace App\Services\AuthenticationService\Providers;

use App\Services\AuthenticationService\Repositories\V1\Authentication\AuthenticationRepository;
use App\Services\AuthenticationService\Repositories\V1\Authentication\AuthenticationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthenticationRepositoryInterface::class, AuthenticationRepository::class);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__.'/../Language', 'authentication');
    }
}
