<?php

namespace App\Services\AuthenticationService\Documents\V1;

use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/v1/auth/check",
 *     tags={"Seller > Authentication"},
 *     summary="Check User For Authentication",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *              @OA\Schema(required={},
 *                  example={"username": "09901849202"}
 *              )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 *
 * @OA\Post(
 *     path="/api/v1/auth/verify",
 *     tags={"Seller > Authentication"},
 *     summary="Verify User For Authentication",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *              @OA\Schema(required={},
 *                  example={"username": "09901849202", "code": "9876"}
 *              )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 *
 * @OA\Delete(
 *     path="/api/v1/auth/logout",
 *     tags={"Seller > Authentication"},
 *     summary="Logout Current User",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 */
class Auth
{

}
