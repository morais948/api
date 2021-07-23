<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('v1')->middleware('jwt')->group(function(){
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    /**rotas da logica */
    Route::apiResource('produto', 'App\Http\Controllers\ProdutosController');
});

Route::post('login', 'App\Http\Controllers\Api\AuthController@login');

Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');
