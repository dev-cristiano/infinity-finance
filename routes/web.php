<?php

use App\Http\Controllers\Api\AlertaController;
use App\Http\Controllers\Api\DespesaController;
use App\Http\Controllers\Api\ReceitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas.index');
    Route::get('/receitas/create', [ReceitaController::class, 'create'])->name('receitas.create');

    Route::get('/despesas', [DespesaController::class, 'index'])->name('despesas.index');
    Route::get('/despesas/create', [DespesaController::class, 'create'])->name('despesas.create');

    Route::get('/alertas', [AlertaController::class, 'index'])->name('alertas.index');
    Route::get('/alertas/create', [AlertaController::class, 'create'])->name('alertas.create');
});

require __DIR__ . '/auth.php';
