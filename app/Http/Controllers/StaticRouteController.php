<?php

namespace App\Http\Controllers;

/**
 * @OA\Schema(schema="token",
 *     description="current token",
 *     type="object",
 *     example={
 *       "access-key": "string",
 *       "secret-key": "string",
 * })
 *
 * Class StaticRouteController
 * @package App\Http\Controllers
 */
class StaticRouteController extends Controller
{
    /**
     * @OA\Get(path="/",
     *     @OA\Response(response=200,
     *         description="returns pong",
     *         @OA\JsonContent(type="object", example={"laravel-api": "swagger-php-demo"})
     *     ),
     *     security={}
     * )
     */
    public function ping()
    {
        return ['laravel-api' => 'swagger-php-demo'];
    }

    private static function generateToken($length = 40): string
    {
        $results = '';
        for ($_i = 0; $_i < $length; $_i++) {
            $results .= sha1(microtime(true) . mt_rand(10000, 90000));
        }

        return substr($results, 0, $length);
    }

    /**
     * @OA\Get(path="/token",
     *     operationId="StaticRouteController::getToken",
     *     description="\App\Http\Controllers\StaticRouteController::getToken",
     *     tags={"Auth"},
     *     summary="get token",
     *     @OA\Response(response=200,
     *         description="returns object with keys token",
     *         @OA\JsonContent(ref="#/components/schemas/token")
     *     ),
     *     @OA\Response(response=401, ref="#/components/schemas/Unauthorized"),
     *     security={}
     * )
     *
     * @return array
     */
    public function getToken()
    {
        $secret_key = (__CLASS__)::generateToken();

        return [
            'access-key' => encrypt($secret_key),
            'secret-key' => $secret_key
        ];
    }
}
