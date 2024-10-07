<?php

namespace App\Services\AuthenticationService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property integer $id
 * @property string $username
 * @property string $mobile
 * @property string $password
 * @property array $data
 * @property integer $status
 * @property boolean $is_blocked
 *
 * @property string $full_name
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'username',
        'mobile',
        'password',
        'data',
        'is_blocked',
        'status',
    ];

    protected $hidden = [
        'password'
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => !is_null($value) || trim($value) != '' ? Hash::make(trim($value)) : null,
        );
    }
    public function wallets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wallet::class);
    }
}
