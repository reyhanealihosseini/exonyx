<?php

namespace App\Services\CryptocurrencyService\Repository\V1\Admin\Cryptocurrency;

use App\Services\CryptocurrencyService\Models\Cryptocurrency;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CryptocurrencyRepository implements CryptocurrencyInterface
{
    private Cryptocurrency $model;

    public function __construct(Cryptocurrency $model)
    {
        $this->model = $model;
    }

    public function index(array $parameters = [], array $columns = ['*']): LengthAwarePaginator|Collection
    {
        $query = $this->model->query();

        $query = $this->query($query, $parameters);

        $query = $this->filters($query, $parameters);

        $query = $this->sort($query, $parameters);

        return $this->export($query, $parameters, $columns);
    }

    public function conditions(Builder $query): array
    {
        return [];
    }

    protected function filters(Builder $query, array $parameters = [], array $columns = ['*']): Builder
    {
        $this->columns = $columns;
        $rules = $this->conditions($query);
        foreach ($rules as $field => $condition) {
            if (array_key_exists($field, $parameters)) {
                if (is_callable($condition)) {
                    $query = $condition($parameters[$field]);
                } elseif ($condition == 'like') {
                    $query->where($field, $condition, "%" . $parameters[$field] . "%");
                } else {
                    $query->where($field, $condition, $parameters[$field]);
                }
            }
        }
        return $query;
    }

    public function query(Builder $query, array $parameters): Builder
    {
        return $query;
    }

    protected function sort(Builder $query, array $parameters): Builder
    {
        return $query
            ->orderBy($parameters['sort_by'] ?? $this->model->getKeyName(), $parameters['sort_direction'] ?? 'desc');
    }

    protected function export(Builder $query, array $parameters = [], array $columns = ['*']): Builder|Collection|LengthAwarePaginator|array
    {
        if ($columns != $this->columns) {
            $this->columns = $columns;
        }

        return match ($parameters['export_type'] ?? null) {
            'builder'    => $query->select($columns),
            'collection' => $query->get($columns),
            'array'      => $query->get($columns)->toArray(),
            default      => $query->paginate($parameters['per_page'] ?? $this->model->getPerPage(), $columns)
        };
    }

    public function store(array $parameters): Model
    {
        return $this->model->query()
            ->create($parameters);
    }

    public function update(Model $model, array $parameters): Model
    {
        $model->update($parameters);

        return $model->refresh();
    }

    public function updateById(int|string $id, array $parameters): Model
    {
        $result = $this->model->query()
            ->where($this->model->getKeyName(), $id)
            ->update($parameters);

        if ($result === 0) {
            throw (new ModelNotFoundException)->setModel(get_class($this->model), [$id]);
        }

        return $this->find($id);
    }

    public function show(Model $model): Model
    {
        return $model;
    }

    public function find(int|string $id): ?Model
    {
        return $this->model->query()->find($id);
    }

    public function findOrFail(int|string $id): ?Model
    {
        return $this->model->query()->findOrFail($id);
    }


    public function updateOrCreate(Model $model, array $conditions, array $values): Model
    {
        return $model->query()->updateOrCreate($conditions, $values);
    }

    public function destroy(Model $model): bool
    {
        return $model->delete();
    }

    public function destroyById(int|string $id): bool
    {
        return $this->model->query()
            ->where('id', $id)
            ->delete();
    }
}
