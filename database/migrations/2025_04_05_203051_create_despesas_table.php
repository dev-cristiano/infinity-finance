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
        Schema::create('despesas', function (Blueprint $table) {
            // Identificação
            $table->id();

            // Dados básicos (consistentes com receitas)
            $table->string('descricao', 200);
            $table->decimal('valor', 12, 2); // Mesma precisão que receitas
            $table->date('data_pagamento')->index();
            $table->date('data_vencimento')->nullable()->index();
            $table->string('status_id')->default(1); // Padronizado com receitas

            // Informações adicionais
            $table->text('observacao')->nullable();
            $table->string('fonte_recebedora', 100)->nullable(); // Similar a fonte_pagadora
            $table->enum('metodo_pagamento', ['dinheiro', 'pix', 'transferencia', 'cartao', 'boleto', 'outro'])->nullable();

            // Controle de parcelamento (específico para despesas)
            $table->integer('parcela_atual')->nullable();
            $table->integer('total_parcelas')->nullable();

            // Controle de recorrência (padronizado com receitas)
            $table->boolean('fixa')->default(false);
            $table->date('data_fim_recorrencia')->nullable();

            // Relacionamentos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->index(['user_id', 'data_pagamento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
