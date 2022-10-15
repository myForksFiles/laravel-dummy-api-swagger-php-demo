<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="Open API demo Swagger PHP / L5 Swagger",
 *         version="1.1.0",
 *         description="Use <a href='#operations-Authorisation-Login'>/login</a> route with dev credentials to get token.
<br /><b>TAGS: </b>
<a href='#operations-tag-Auth'>Auth</a>,
<a href='#operations-tag-User'>User</a>,
<a href='#operations-tag-Test'>Test</a>,
<a href='#operations-tag-Allowed'>Test</a>,
<ul>
<li>setUp correctly .env file @todo</li>
</ul>"
 *
 *     ),
 *     @OA\PathItem(path="/"),
 *     @OA\Server(url="/api", description="local dev"),
 *     @OA\Server(url="http://ls.ddev.site/api", description="staging"),
 *     security={{"authToken": {}}}
 * )
 *
 * ### Tags ####################################################################
 * @OA\Tag(name="Auth", description="Authorisation, token")
 *
 * @OA\Tag(name="User", description="users")
 *
 * @OA\Tag(name="Test", description="some to do")
 *
 * @OA\Tag(name="Allowed", description="free")
 *
 * ### SECURITY ################################################################
 * @OA\SecurityScheme(type="apiKey",
 *     in="header",
 *     securityScheme="authToken",
 *     name="auth-token",
 * )
 *
 * ### Common parameters #######################################################
 * @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer"))
 *
 * @OA\Parameter(parameter="dateStart", name="start", in="query", required=false,
 *     description="Start date",
 *     @OA\Schema(type="date-time", example="2018-11-16"))
 *
 * @OA\Parameter(parameter="dateEnd", name="end", in="query", required=false,
 *     description="End date",
 *     @OA\Schema(type="date-time", example="2018-01-31"))
 *
 * ### Common responses ########################################################
 * // 204 >> empty
 * @OA\Response(response="empty",
 *     description="empty results", @OA\JsonContent(type="string", example=""))
 *
 * // 200 >> ok
 * @OA\Schema(schema="OK",
 *     description="just ok",
 *     @OA\Property(property="message", type="string")
 * )
 *
 * // 202 >> Accepted
 * @OA\Schema(schema="Accepted",
 *     description="Accepted", @OA\Property(property="message", type="string", example="Accepted"))
 *
 * // 400
 * @OA\Schema(schema="BadRequest",
 *     description="bad request", @OA\Property(property="message", type="string", example="Bad request."))
 *
 * // 401
 * @OA\Schema(schema="Unauthorized",
 *     description="unauthorized access", type="object", example={"message": "Not Authorized!"})
 *
 * // 404
 * @OA\Schema(schema="NotFound",
 *     description="not found", @OA\Property(property="message", type="string", example="Not found"))
 *
 * // 429
 * @OA\Schema(schema="TooManyRequests",
 *     description="too Many Requests", @OA\Property(property="message", type="string", example="Too Many Attempts"))
 *
 * // 500
 * @OA\Schema(schema="InternalServerError",
 *     description="internal server error", @OA\Property(property="message", type="string", example="Internal Server Error"))
 *
 * // 502
 * @OA\Schema(schema="BadGateway",
 *     description="invalid response", @OA\Property(property="message", type="string", example="Client error: resulted as Bad Request"))
 *
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function response(array $data, int $response): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $response);
    }

    public function error($error = 'error')
    {
        return self::response(['status' => $error], Response::HTTP_BAD_REQUEST);
    }
}
