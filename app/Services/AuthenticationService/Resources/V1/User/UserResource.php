<?php

namespace App\Services\AuthenticationService\Resources\V1\User;

use App\Services\AuthenticationService\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;


/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'username'      => $this->username,
            'mobile'        => $this->mobile,
            'is_blocked'    => $this->is_blocked,
            'status'        => $this->status,
        ];
    }
}
