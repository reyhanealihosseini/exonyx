<?php

namespace App\Services\AuthenticationService\Repositories\V1\Authentication;

interface AuthenticationRepositoryInterface
{
    public function logout(): bool;

    public function check(array $parameters);

    public function verify(array $parameters);
}
