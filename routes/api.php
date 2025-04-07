<?php

use App\Http\Controllers\Api\AlertaController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ReceitaController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/new-transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::post('/new-categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/transactions', [ReceitaController::class, 'store'])->name('receitas.store');

Route::post('/alertas', [AlertaController::class, 'store'])->name('alertas.store');
