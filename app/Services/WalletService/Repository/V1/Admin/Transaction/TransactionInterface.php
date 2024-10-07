<?php

namespace App\Services\WalletService\Repository\V1\Admin\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface TransactionInterface
{
    public function index(array $parameters = []): LengthAwarePaginator|Collection;
    public function store(array $parameters): Model;
}
