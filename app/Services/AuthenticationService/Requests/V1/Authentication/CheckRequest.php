<?php

namespace App\Services\AuthenticationService\Requests\V1\Authentication;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required']
        ];
    }
}
