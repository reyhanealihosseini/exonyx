<?php

namespace App\Services\CryptocurrencyService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $title
 */
class Cryptocurrency extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cryptocurrencies';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'status',
    ];
}
