<?php

namespace App\Services\CryptocurrencyService\Documents\V1\Admin;

use OpenApi\Annotations as OA;

/**
 *
 * @OA\Post(
 *     path="/api/admin/v1/cryptocurrencies",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="Create a Cryptocurrency",
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(required={},
 *                  example= {
 *                        "title": "title",
 *                        "slug": "slug",
 *                        "status": 1
 *                    }
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/admin/v1/cryptocurrencies",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="List all cryptocurrencies",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/admin/v1/cryptocurrencies/select",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="List all cryptocurrencies for Select",
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/admin/v1/cryptocurrencies/{cryptocurrency}",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="Find Cryptocurrency by id",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(name="cryptocurrency", in="path", description="Cryptocurrency id", @OA\Schema(type="integer")),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 *
 * @OA\Patch(
 *     path="/api/admin/v1/cryptocurrencies/{cryptocurrency}",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(name="cryptocurrency", in="path", description="Cryptocurrency id", @OA\Schema(type="integer")),
 *     @OA\RequestBody(required=true,
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(required={},
 *                  example= {
 *                       "title": "title",
 *                       "slug": "slug",
 *                       "status": 1
 *                   }
 *              )
 *          )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/admin/v1/cryptocurrencies/{cryptocurrency}",
 *     tags={"Admin > Cryptocurrency"},
 *     summary="Delete Cryptocurrency by id",
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(name="cryptocurrency", in="path", description="Cryptocurrency id", @OA\Schema(type="integer")),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     )
 * )
 *
 */
class Cryptocurrency
{

}
