<?php

use App\Http\Controllers\Api\V1\ColumnController;
use Illuminate\Support\Facades\Route;

Route::get('columns', [ColumnController::class, 'index'])->name('columns.index');
Route::post('columns', [ColumnController::class, 'store'])->name('columns.store');
Route::get('columns/{id}', [ColumnController::class, 'show'])->name('columns.show');
Route::put('columns/{id}', [ColumnController::class, 'update'])->name('columns.update');
Route::delete('columns/{id}', [ColumnController::class, 'destroy'])->name('columns.destroy');
Route::get('columns/{id}/tasks', [ColumnController::class, 'tasks'])->name('columns.tasks');

