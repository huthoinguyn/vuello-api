<?php

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request){
    return $request->user();
});

Route::group(['prefix' => 'v1'], function (){
    require __DIR__ . '/api/v1/board.php';
    require __DIR__ . '/api/v1/column.php';
    require __DIR__ . '/api/v1/card.php';
    require __DIR__ . '/api/v1/user.php';
})->middleware('auth:api');

require __DIR__ . '/auth.php';
