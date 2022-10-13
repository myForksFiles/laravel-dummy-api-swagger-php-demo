<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StaticRouteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/')->group(function () {
    Route::get('/', [StaticRouteController::class, 'ping']);
    Route::get('token', [StaticRouteController::class, 'getToken']);
});

//Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);

$user = UserController::class;
$test = TestController::class;
$routes = [
    'get'    => [
        '/list'      => [$user, 'list'],
        '/read/{id}' => [$user, 'read'],
        '/show'      => [$test, 'showEntry'],
    ],
    'post'   => [
        '/create' => [$user, 'create'],
        '/new'    => [$test, 'newEntry'],
    ],
    'put'    => [
        '/update/{id}' => [$user, 'update'],
        '/update/{id}' => [$user, 'updateEntry'],
    ],
    'delete' => [
        '/delete/{id}' => [$user, 'delete'],
    ],
    'patch'  => [
        '/remove/{id}' => [$user, 'remove'],
    ],
];
//dd(env('APP_DEBUG'));
Route::prefix('/')->group(function () use ($routes) {

    foreach ($routes as $type => $values) {
        foreach ($values as $url => $controller) {
            Route::$type($url, $controller);
        }
    }
});
