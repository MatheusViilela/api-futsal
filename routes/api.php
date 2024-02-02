<?php

use App\Http\Controllers\Championships\ChampionshipsController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Matches\MatchesController;
use App\Http\Controllers\Player\PlayerController;
use App\Http\Controllers\Team\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::middleware('authJwt')->group(function () {
    Route::prefix('team')->group(function () {
        Route::post('/', [TeamController::class, 'create']);
        Route::get('/', [TeamController::class, 'list']);
        Route::put('/', [TeamController::class, 'update']);
        Route::delete('/', [TeamController::class, 'delete']);
    });
    Route::prefix('player')->group(function () {
        Route::post('/', [PlayerController::class, 'create']);
        Route::get('/', [PlayerController::class, 'list']);
        Route::put('/', [PlayerController::class, 'update']);
        Route::delete('/', [PlayerController::class, 'delete']);
    });
    Route::prefix('matches')->group(function () {
        Route::post('/', [MatchesController::class, 'create']);
        Route::get('/', [MatchesController::class, 'list']);
        Route::put('/', [MatchesController::class, 'update']);
        Route::delete('/', [MatchesController::class, 'delete']);
    });
    Route::prefix('championships')->group(function () {
        Route::get('/', [ChampionshipsController::class, 'list']);
    });
});
