<?php

use App\Http\Controllers\Api\V1\BoardController;
use Illuminate\Support\Facades\Route;

Route::get('boards', [BoardController::class, 'index'])->name('boards.index');
Route::post('boards', [BoardController::class, 'store'])->name('boards.store');
Route::get('boards/{id}', [BoardController::class, 'show'])->name('boards.show');
Route::put('boards/{id}', [BoardController::class, 'update'])->name('boards.update');
Route::delete('boards/{id}', [BoardController::class, 'destroy'])->name('boards.destroy');
Route::get('boards/{id}/columns', [BoardController::class, 'columns'])->name('boards.columns');
