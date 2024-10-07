<?php

namespace App\Services\CryptocurrencyService\Resources\V1\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 */
class CryptocurrencyResource extends JsonResource
{
    public function toArray($request): array
    {
        return $this->resource;
    }
}
