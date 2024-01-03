<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChallengeController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('configuration', [UserController::class, 'configuration']);
Route::post('challenges', [ChallengeController::class, 'paginate']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('categories', [CategoryController::class, 'paginate']);
    Route::post('levels', [LevelController::class, 'paginate']);

    Route::post('levelsByCategory/{category_id}', [LevelController::class, 'levelsByCategory']);
    Route::post('level/{id}', [LevelController::class, 'levelById']);
    Route::post('solved/{id}', [LevelController::class, 'solved']);
});



