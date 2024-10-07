<?php

namespace App\Services\AuthenticationService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_at' => 'datetime'
    ];

    protected $fillable = [
        'mobile',
        'code',
        'retries',
        'send_at',
    ];
}
