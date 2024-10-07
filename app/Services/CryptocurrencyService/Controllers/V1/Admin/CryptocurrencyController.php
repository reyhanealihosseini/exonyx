<?php

namespace App\Services\CryptocurrencyService\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\CryptocurrencyService\Models\Cryptocurrency;
use App\Services\CryptocurrencyService\Repository\V1\Admin\Cryptocurrency\CryptocurrencyInterface;
use App\Services\CryptocurrencyService\Requests\V1\Admin\Cryptocurrency\CreateRequest;
use App\Services\CryptocurrencyService\Requests\V1\Admin\Cryptocurrency\UpdateRequest;
use App\Services\CryptocurrencyService\Resources\V1\Admin\CryptocurrencyResource;
use Celysium\Responser\Responser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CryptocurrencyController extends Controller
{
    public function __construct(private readonly CryptocurrencyInterface $cryptocurrencyService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $cryptocurrencies = $this->cryptocurrencyService->index($request->query());

        return Responser::success(CryptocurrencyResource::collection($cryptocurrencies));
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $cryptocurrency = $this->cryptocurrencyService->store($request->validated());

        return Responser::success(new CryptocurrencyResource($cryptocurrency));
    }

    public function show(Cryptocurrency $cryptocurrency): JsonResponse
    {
        $cryptocurrency = $this->cryptocurrencyService->show($cryptocurrency);

        return Responser::success(new CryptocurrencyResource($cryptocurrency));
    }

    public function update(UpdateRequest $request, Cryptocurrency $cryptocurrency): JsonResponse
    {
        $cryptocurrency = $this->cryptocurrencyService->update($cryptocurrency, $request->validated());

        return Responser::success(new CryptocurrencyResource($cryptocurrency));
    }

    public function destroy(Cryptocurrency $cryptocurrency): JsonResponse
    {
        $this->cryptocurrencyService->destroy($cryptocurrency);

        return Responser::deleted();
    }
}
