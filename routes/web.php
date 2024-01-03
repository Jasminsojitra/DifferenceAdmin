<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.view');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');



    Route::get('/levels', [LevelController::class, 'index'])->name('level.index');
    Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
    Route::post('/level/create', [LevelController::class, 'store'])->name('level.store');

    Route::get('/level/{id}', [LevelController::class, 'show'])->name('level.view');

    Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('level.edit');
    Route::post('/level/edit/{id}', [LevelController::class, 'update'])->name('level.update');

    Route::post('/level/delete/{id}', [LevelController::class, 'destroy'])->name('level.delete');

    Route::post('/point/delete/{id}', [LevelController::class, 'destroyPoint'])->name('point.delete');


    Route::get('/challenges', [ChallengeController::class, 'index'])->name('challenge.index');
    Route::get('/challenge/create', [ChallengeController::class, 'create'])->name('challenge.create');
    Route::post('/challenge/create', [ChallengeController::class, 'store'])->name('challenge.store');
    Route::get('/challenge/edit/{id}', [ChallengeController::class, 'edit'])->name('challenge.edit');
    Route::post('/challenge/edit/{id}', [ChallengeController::class, 'update'])->name('challenge.update');
    Route::post('/challenge/delete/{id}', [ChallengeController::class, 'destroy'])->name('challenge.delete');




});

require __DIR__ . '/auth.php';


