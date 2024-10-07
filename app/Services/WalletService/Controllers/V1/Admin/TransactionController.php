<?php

namespace App\Services\WalletService\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\WalletService\Repository\V1\Admin\Transaction\TransactionRepository;
use App\Services\WalletService\Requests\V1\Admin\Transaction\CreateRequest;
use App\Services\WalletService\Resources\V1\Admin\TransactionResource;
use Celysium\Responser\Responser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    public function __construct(private readonly TransactionRepository $transactionRepository)
    {
    }

    /**
     * @throws ValidationException
     */
    public function store(CreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->transactionRepository->store($request->all());

        return Responser::success();
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $transactions = $this->transactionRepository->index($request->all());

        return TransactionResource::collection($transactions);
    }
}
