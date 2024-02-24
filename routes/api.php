<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ThreadDetailController;
use App\Http\Controllers\UserController;
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

Route::post('user', [UserController::class, 'create']);

Route::middleware('auth:api')->group(function () {
    Route::get('books', [BookController::class, 'getAll']);
    Route::get('book/{id}', [BookController::class, 'getById']);

    Route::get('carts', [CartController::class, 'getAll']);
    Route::post('cart', [CartController::class, 'create']);

    Route::get('borrows', [BorrowController::class, 'getAll']);
    Route::post('borrow', [BorrowController::class, 'create']);

    Route::get('threads', [ThreadController::class, 'getAll']);
    Route::post('thread', [ThreadController::class, 'create']);
    Route::delete('thread/{id}', [ThreadController::class, 'delete']);

    Route::get('thread-details', [ThreadDetailController::class, 'getAll']);
    Route::post('thread-detail', [ThreadDetailController::class, 'create']);
    Route::delete('thread-detail/{id}', [ThreadDetailController::class, 'delete']);
});
