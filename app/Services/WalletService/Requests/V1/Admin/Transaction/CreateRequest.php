<?php

namespace App\Services\WalletService\Requests\V1\Admin\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'currency_id' => 'required|exists:cryptocurrencies,id',
            'type' => 'required|in:deposit,withdraw',
            'amount' => 'required|numeric|min:0',
        ];
    }
}
