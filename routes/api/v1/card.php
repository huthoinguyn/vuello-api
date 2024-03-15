<?php

use App\Http\Controllers\Api\V1\CardController;
use Illuminate\Support\Facades\Route;

Route::get('cards', [CardController::class, 'index'])->name('cards.index');
Route::post('cards', [CardController::class, 'store'])->name('cards.store');
Route::get('cards/{id}', [CardController::class, 'show'])->name('cards.show');
Route::put('cards/{id}', [CardController::class, 'update'])->name('cards.update');
Route::delete('cards/{id}', [CardController::class, 'destroy'])->name('cards.destroy');
Route::patch('cards/{id}/move', [CardController::class, 'move'])->name('cards.move');
Route::patch('cards/{id}/assign', [CardController::class, 'assign'])->name('cards.assign');
Route::post('cards/{id}/follow', [CardController::class, 'follow'])->name('cards.follow');
Route::delete('cards/{id}/unfollow', [CardController::class, 'unfollow'])->name('cards.unfollow');
Route::post('cards/{id}/add-following', [CardController::class, 'addFollowing'])
     ->name('cards.add-following');
