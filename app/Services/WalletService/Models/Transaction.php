<?php

namespace App\Services\WalletService\Models;

use App\Services\AuthenticationService\Models\User;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $fillable = ['wallet_id', 'type', 'amount', 'transaction_date'];

    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
