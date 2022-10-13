<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller implements CrudInterface
{
    protected $users = [
            ['1', 'name', 'email', 'created_at', 'updated_at'],
            ['2', 'user', 'user@email', '2018-11-16 12:34:56', '2018-11-17 01:23:45'],
            ['3', 'test', 'test@email', '1910-11-16 00:00:00', '1910-11-17 00:00:00'],
            ['5', 'some', 'test@email', '2022-10-10 00:00:00', '2022-10-10 12:34:56'],
        ];

    /**
     * @OA\Post(path="/create",
     *     operationId="UserControllerCreate",
     *     description="\App\Http\Controllers\UserControllerCreate",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="user update request",
     *         @OA\MediaType(mediaType="multipart/form-data",
     *             @OA\Schema(type="object",
     *                 @OA\Property(type="string", property="name", description="name", default=""),
     *                 @OA\Property(type="string", property="email", description="email", default=""),
     *         )),
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\JsonContent(example={"name": "string", "email": "string"})),
     *     ),
     *     @OA\Response(response=201, ref="#/components/schemas/OK",
     *         description="created requested entry return id",
     *         @OA\JsonContent(type="string", example={"id": "integer"})),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     * )
     */
    public function create($data)
    {
//        return view('create');
        $this->response(['status' => 'created'], 'HTTP_CREATED');
    }

    /**
     * @OA\Get(path="/read",
     *     operationId="UserControllerRead",
     *     description="\App\Http\Controllers\UserControllerRead",
     *     tags={"User", "Allowed"},
     *     @OA\Parameter(name="error", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="results",
     *         @OA\JsonContent(example={
     *           {"status", "list"},
     *           {{"1", "name", "email", "created_at", "updated_at"}, {"2", "name", "email", "created_at", "updated_at"}}
     *     })),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     * )
     */
    public function read(int $id)
    {
        $this->response(['status' => 'show'], 'HTTP_OK');
    }

    /**
     * @OA\Put(path="/update/{id}",
     *     operationId="UserControllerUpdate",
     *     description="\App\Http\Controllers\UserControllerUpdate",
     *     tags={"User"},
     *     @OA\Parameter(name="id", in="path", required=false, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         description="user update request",
     *         @OA\MediaType(mediaType="multipart/form-data",
     *             @OA\Schema(type="object",
     *                 @OA\Property(type="string", property="name", description="name", default=""),
     *                 @OA\Property(type="string", property="email", description="email", default=""),
     *         )),
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\JsonContent(example={"name": "string", "email": "string"})),
     *     ),
     *     @OA\Response(response=202, ref="#/components/schemas/Accepted",
     *         @OA\JsonContent(example={"status": "updated"})),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     * )
     */
    public function update(int $id, array $data)
    {
//        $this->response(['status' => 'show'], 'HTTP_OK');
        $this->response(['status' => 'updated'], 'HTTP_ACCEPTED');
    }

    /**
     * @OA\Delete(path="/delete/{id}",
     *     operationId="UserControllerDelete",
     *     description="\App\Http\Controllers\UserControllerDelete",
     *     tags={"User"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="con content",
     *         @OA\JsonContent(example={})),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     * )
     */
    public function delete(int $id)
    {
        $this->response(['status' => 'deleted'], 'HTTP_NO_CONTENT');
    }

    /**
     * @OA\Patch(path="/remove",
     *     operationId="UserControllerRemove",
     *     description="\App\Http\Controllers\UserControllerRemove",
     *     tags={"User"},
     *     @OA\Parameter(name="error", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=205, description="reset content",
     *         @OA\JsonContent(example={"status", "removed"})),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     *     deprecated=true
     * )
     */
    public function remove(int $id)
    {
        $this->response(['status' => 'created'], 'HTTP_RESET_CONTENT');
    }

    /**
     * @OA\Get(path="/list",
     *     operationId="UserControllerList",
     *     description="\App\Http\Controllers\UserControllerList",
     *     tags={"User", "Allowed"},
     *     @OA\Parameter(name="error", in="query", required=false, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="results",
     *         @OA\JsonContent(example={
     *           {"status", "list"},
     *           {{"1", "name", "email", "created_at", "updated_at"}, {"2", "name", "email", "created_at", "updated_at"}}
     *     })),
     *     @OA\Response(response=400, ref="#/components/schemas/BadRequest",
     *         @OA\JsonContent(example={"status": "errorNotShowThisExample"})),
     *     security={}
     * )
     */
    public function list(Request $request)
    {
        if ($request->filled('error')) {
            return $this->error();
        }

        return self::response(['status' => 'list', 'results' => $this->users], Response::HTTP_OK);
    }
}
