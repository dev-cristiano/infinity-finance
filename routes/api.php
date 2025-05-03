<?php

use App\Http\Controllers\Api\AlertaController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ReceitaController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\MaytapiWhatsAppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/new-transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::post('/new-categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/transactions', [ReceitaController::class, 'store'])->name('receitas.store');

Route::post('/alertas', [AlertaController::class, 'store'])->name('alertas.store');
Route::put('/alertas/{id}', [AlertaController::class, 'update'])->name('alertas.update');

Route::post('/whatsapp/send-message', [MaytapiWhatsAppController::class, 'sendMessage']);