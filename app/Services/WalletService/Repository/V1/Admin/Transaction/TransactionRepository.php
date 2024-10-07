<?php

namespace App\Services\WalletService\Repository\V1\Admin\Transaction;

use App\Services\WalletService\Models\Transaction;
use App\Services\WalletService\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class TransactionRepository implements TransactionInterface
{
    private Transaction $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function index(array $parameters = []): LengthAwarePaginator|Collection
    {
        return $this->model->query()
            ->whereHas('wallet', function ($query) use ($parameters) {
                $query->where('user_id', auth()->id())
                    ->when($parameters['currency_id'], function ($query, $currency_id) {
                        $query->where('currency_id', $currency_id);
                    });
            })
            ->when($parameters['start_date'], function ($query, $start_date) {
                $query->whereDate('transaction_date', '>=', $start_date);
            })
            ->when($parameters['end_date'], function ($query, $end_date) {
                $query->whereDate('transaction_date', '<=', $end_date);
            })
            ->paginate();
    }

    /**
     * @throws ValidationException
     */
    public function store(array $parameters): Model
    {
        $wallet = Wallet::query()->where('user_id', auth()->id())
            ->where('currency_id', $parameters['currency_id'])
            ->firstOrFail();

        if ($parameters['type'] === 'withdraw' && $wallet->balance < $parameters['amount']) {
            throw ValidationException::withMessages([/* return appropriate message */]);
        }

        if ($parameters['type'] === 'deposit') {
            $wallet->balance += $parameters['amount'];
        } else {
            $wallet->balance -= $parameters['amount'];
        }
        $wallet->save();

        return $this->model->query()
            ->create([
                'type' => $parameters['type'],
                'amount' => $parameters['amount'],
                'transaction_date' => now(),
                'currency_id' => $parameters['currency_id'],
                'wallet_id' => $wallet->id,
            ]);
    }
}
