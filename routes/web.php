<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'show'])->name('home');
Route::prefix('goals')->name('goals.')->group(function () {
    Route::get('create', [MainController::class, 'createGoal'])->name('create');
    Route::post('store', [MainController::class, 'storeGoal'])->name('store');
    Route::delete('{goal}', [MainController::class, 'destroyGoal'])->name('destroy');
    Route::get('{goal}/edit', [MainController::class, 'editGoal'])->name('edit');
    Route::put('{goal}', [MainController::class, 'updateGoal'])->name('update');
});
Route::prefix('savings')->name('savings.')->group(function () {
    Route::get('{goal}', [MainController::class, 'listSaving'])->name('list');
    Route::get('{goal}/add', [MainController::class, 'createSaving'])->name('create');
    Route::post('{goal}/add', [MainController::class, 'storeSaving'])->name('store');
    Route::get('{saving}/edit', [MainController::class, 'editSaving'])->name('edit');
    Route::put('{saving}', [MainController::class, 'updateSaving'])->name('update');
    Route::delete('{saving}', [MainController::class, 'destroySaving'])->name('destroy');
});
