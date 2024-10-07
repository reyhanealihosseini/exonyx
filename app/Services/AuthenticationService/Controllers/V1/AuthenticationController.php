<?php

namespace App\Services\AuthenticationService\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService\Repositories\V1\Authentication\AuthenticationRepositoryInterface;
use App\Services\AuthenticationService\Requests\V1\Authentication\CheckRequest;
use App\Services\AuthenticationService\Requests\V1\Authentication\VerifyRequest;
use App\Services\AuthenticationService\Resources\V1\User\UserResource;
use Celysium\Responser\Responser;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthenticationController extends Controller
{
    public function __construct(private readonly AuthenticationRepositoryInterface $authenticationService)
    {
    }

    /**
     * @param CheckRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function check(CheckRequest $request): JsonResponse
    {
        $result = $this->authenticationService->check($request->validated());

        return Responser::info($result);
    }

    /**
     * @param VerifyRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function verify(VerifyRequest $request): JsonResponse
    {
        $result = $this->authenticationService->verify($request->validated());

        return Responser::success([
            'auth' => $result['auth'],
            'user' => new UserResource($result['user'])
        ]);
    }

    public function logout(): JsonResponse
    {
        $this->authenticationService->logout();

        return Responser::success();
    }

}
