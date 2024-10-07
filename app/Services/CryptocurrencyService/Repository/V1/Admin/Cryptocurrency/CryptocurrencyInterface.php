<?php

namespace App\Services\CryptocurrencyService\Repository\V1\Admin\Cryptocurrency;

use Illuminate\Database\Eloquent\Model;

interface CryptocurrencyInterface
{
    public function show(Model $model): Model;

    public function find(int|string $id): ?Model;

    public function findOrFail(int|string $id): ?Model;

    public function store(array $parameters): Model;

    public function update(Model $model, array $parameters): Model;

    public function updateById(int|string $id, array $parameters): ?Model;

    public function updateOrCreate(Model $model, array $conditions, array $values): Model;

    public function destroy(Model $model): bool;

    public function destroyById(int|string $id): bool;
}
