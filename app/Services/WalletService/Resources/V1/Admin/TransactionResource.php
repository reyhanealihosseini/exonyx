<?php

namespace App\Services\WalletService\Resources\V1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
class TransactionResource extends JsonResource
{
    public function toArray($request): array
    {
        return $this->resource;
    }
}
