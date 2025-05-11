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

// Routas das receitas
Route::post('/receitas', [ReceitaController::class, 'store'])->name('receitas.store');
Route::put('/receitas/{id}', [ReceitaController::class, 'update'])->name('receitas.update');
Route::delete('/receitas/{id}', [ReceitaController::class, 'destroy'])->name('receitas.destroy');

// Routa de envio de mensagens via WhatsApp com os dados dos boletos a vencerem
Route::post('/whatsapp/send-message', [MaytapiWhatsAppController::class, 'sendMessage']);