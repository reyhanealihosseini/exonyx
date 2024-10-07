<?php

namespace App\Services\AuthenticationService\Requests\V1\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required'],
            'code'     => ['required', 'string'],
        ];
    }
}
