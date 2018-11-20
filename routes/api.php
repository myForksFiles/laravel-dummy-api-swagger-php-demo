<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/')->group(function () {
    Route::get('/', 'StaticRouteController@ping');
    Route::get('token', 'StaticRouteController@getToken');
});

$user = 'UserController@';
$test = 'TestController@';
$routes = [
    'get'    => [
        '/list'      => $user . 'list',
        '/read/{id}' => $user . 'read',
        '/show'      => $test . 'showEntry',
    ],
    'post'   => [
        '/create' => $user . 'create',
        '/new' => $test . 'newEntry',
    ],
    'put'    => [
        '/update/{id}' => $user . 'update',
        '/update/{id}' => $user . 'updateEntry',
    ],
    'delete' => [
        '/delete/{id}' => $user . 'delete',
    ],
    'patch'  => [
        '/remove/{id}' => $user . 'remove'
    ],
];

Route::prefix('/')->group(function () use ($routes) {
    foreach ($routes as $type => $values) {
        foreach ($values as $url => $controller) {
            Route::$type($url, $controller);
        }
    }
});
