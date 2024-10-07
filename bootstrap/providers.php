<?php

return [
    App\Providers\AppServiceProvider::class,
    \App\Services\AuthenticationService\Providers\AuthenticationServiceProvider::class,
    \App\Services\CryptocurrencyService\Providers\CryptocurrencyServiceProvider::class
];
