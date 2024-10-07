<?php

namespace App\Services\AuthenticationService\Repositories\V1\Authentication;

use App\Services\AuthenticationService\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public function __construct() {
    }

    public function logout(): bool
    {
        /** @var User $user */
        $user = Auth::user();
        return $user->tokens()->delete();
    }

    public function me(): User
    {
        /** @var User $user */
        $user = Auth::user();
        return $user;
    }

    /**
     * @param  array  $parameters
     *
     * @return array
     */
    public function check(array $parameters): array
    {
        $username = $parameters['username'];

        $user = User::query()
            ->where('mobile', $username)
            ->first();

        // todo: send OTP

        if ($user) {
            return [
                'exist' => true
            ];
        } else {
            return [
                'exist' => false
            ];
        }
    }

    /**
     * @param  array  $parameters
     *
     * @return array
     * @throws ValidationException
     */
    public function verify(array $parameters): array
    {
        $username = $parameters['username'];

        $user = User::query()
            ->where('mobile', $username)
            ->first();

        // todo: check OTP

        if (! $user) {
            $user = User::query()->create([
                'username' => $username,
                'mobile'   => $username,
            ]);
        }

        $auth['token'] = $user->createToken('seller-services')->plainTextToken;

        return compact('auth', 'user');
    }
}
