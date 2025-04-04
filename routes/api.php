<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/new-transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::post('/new-categories', [CategoryController::class, 'store'])->name('categories.store');