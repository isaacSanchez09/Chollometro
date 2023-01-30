<?php

use App\Http\Controllers\Api\ChollometroController;
use App\Http\Resources\CholloResource;
use App\Models\Chollo;
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

Route::apiResource('chollos',\App\Http\Controllers\Api\ChollometroController::class);

Route::get('/api/gangas{id}', function ($id) {
    return new CholloResource(Chollo::findOrFail($id));
});

Route::get('/api/gangas', function () {
    return CholloResource::collection(Chollo::all());
});

Route::post('login', [\App\Http\Controllers\Api\LoginController::class,'login']);

