<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receitas', function (Blueprint $table) {
            // Identificação
            $table->id();

            // Dados básicos
            $table->string('descricao', 200);
            $table->decimal('valor', 12, 2); // Aumentado para valores maiores
            $table->date('data_recebimento')->index(); // Index para consultas frequentes
            $table->date('data_vencimento')->nullable()->index();
            $table->string('status_id')->default(1);

            // Informações adicionais
            $table->text('observacao')->nullable();
            $table->string('fonte_pagadora', 100)->nullable();
            $table->enum('metodo_recebimento', ['dinheiro', 'pix', 'transferencia', 'cartao', 'outro'])->nullable();

            // Controle
            $table->boolean('fixa')->default(false); // Para receitas fixas/mensais
            $table->date('data_fim_recorrencia')->nullable(); // Para controle de recorrência

            // Relacionamentos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index(['user_id', 'data_recebimento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
