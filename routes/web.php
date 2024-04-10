<?php

use App\Http\Controllers\MatcheController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('', [MatcheController::class, 'index'])->name('index')->middleware('auth');

Route::group(['prefix' => 'matches', 'as' => 'matches.', 'middleware' => ['auth', 'admin_only']], function () {
    Route::get('', [MatcheController::class, 'index'])->name('index');
    Route::get('create', [MatcheController::class, 'create'])->name('create');
    Route::post('', [MatcheController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'teams', 'as' => 'teams.', 'middleware' => ['auth', 'admin_only']], function () {
    Route::get('', [TeamController::class, 'index'])->name('index');
    Route::get('create', [TeamController::class, 'create'])->name('create');
    Route::post('', [TeamController::class, 'store'])->name('store');
    Route::get('{team}/edit', [TeamController::class, 'edit'])->name('edit');
    Route::put('{team}', [TeamController::class, 'update'])->name('update');
    Route::delete('{team}', [TeamController::class, 'destroy'])->name('destroy');
});


Route::group(['prefix' => 'players', 'as' => 'players.', 'middleware' => ['auth', 'admin_only']], function () {
    Route::get('', [PlayerController::class, 'index'])->name('index');
    Route::get('create', [PlayerController::class, 'create'])->name('create');
    Route::post('', [PlayerController::class, 'store'])->name('store');
    Route::get('{player}/edit', [PlayerController::class, 'edit'])->name('edit');
    Route::put('{player}', [PlayerController::class, 'update'])->name('update');
    Route::delete('{player}', [PlayerController::class, 'destroy'])->name('destroy');
});
