<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    PokemonController,
    PokemonFavoriteController
};

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

Route::controller(PokemonController::class)->prefix('pokemon')->group(function () {
    Route::controller(PokemonFavoriteController::class)->prefix('favorite')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::delete('/{id}', 'destroy');
        Route::get('/abilities', 'getAbilities');
    });

    Route::get('/', 'index');
    Route::get('/export', 'export');
    Route::get('/{id}', 'show');
});
