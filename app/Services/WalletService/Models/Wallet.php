<?php

namespace App\Services\WalletService\Models;


use App\Services\AuthenticationService\Models\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model {
    protected $fillable = ['user_id', 'currency_id', 'balance'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
