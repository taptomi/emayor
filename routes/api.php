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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/blocs')->group(function(){

    Route::get('/',[\App\Http\Controllers\API\BlocsController::class,'index']);
    Route::get('/{shortname}',[\App\Http\Controllers\API\BlocsController::class,'show']);

});

Route::prefix('/posts')->group(function(){

    Route::get('/{slug}',[\App\Http\Controllers\API\PostController::class,'show']);

});
