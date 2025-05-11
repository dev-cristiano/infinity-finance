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

            // Relacionamentos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
           
            // Dados básicos
            $table->string('descricao', 255);
            $table->decimal('valor', 12, 2); 
            $table->date('data_recebimento')->index();
            $table->string('status')->default(['pendente', 'recebido', 'cancelado'])->default('pendente');

            // Informações adicionais
            $table->string('fonte_pagadora', 100)->nullable();
            $table->enum('metodo_recebimento', ['cartao_credito',          'cartao_debito', 'dinheiro', 'pix', 'transferencia',
            'outro'])->nullable();

            // Controle
            $table->boolean('fixa')->default(false);

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
