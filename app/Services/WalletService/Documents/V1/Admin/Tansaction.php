<?php

namespace App\Services\WalletService\Documents\V1\Admin;

use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 * path="/transactions",
 * summary="summary",
 * description="desc",
 * tags={"Transactions"},
 * @OA\RequestBody(
 *      required=true,
 *      @OA\JsonContent(
 *           required={"currency", "type", "amount"},
 *           @OA\Property(property="currency", type="string", example="BTC"),
 *           @OA\Property(property="type", type="string", example="deposit"),
 *           @OA\Property(property="amount", type="number", example=100.5),
 *      ),
 * ),
 * @OA\Response(response=200, description="Transaction created"),
 * security={{"bearerAuth":{}}}
 * )
 *
 * @OA\Get(
 * path="/transactions",
 * tags={"Transactions"},
 * @OA\Parameter(
 *      name="currency",
 *      in="query",
 *      required=false,
 *      @OA\Schema(type="string", example="BTC")
 * ),
 * @OA\Parameter(
 *      name="start_date",
 *      in="query",
 *      required=false,
 *      @OA\Schema(type="string", format="date", example="2023-01-01")
 * ),
 * @OA\Parameter(
 *      name="end_date",
 *      in="query",
 *      required=false,
 *      @OA\Schema(type="string", format="date", example="2023-12-31")
 * ),
 * @OA\Response(response=200, description="List of transactions"),
 *      security={{"bearerAuth":{}}}
 * )
 *
 */
class Tansaction
{

}
