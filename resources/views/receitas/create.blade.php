<x-main
    :button="['route' => route('alertas.store')]">

    <x-form.form
        title="Cadastre uma nova receita"
        description="Gerencie suas receitas"
        :route="route('receitas.store')"
        method="POST"
        :back="route('receitas.index')">

        <x-form.input
            name="user_id"
            :value="Auth::user()->id"
            type="hidden" />

        <x-form.input
            name="descricao"
            label="Descrição"
            type="text"
            placeholder="Ex: Salário"
            :required="true" />

        <x-form.input
            name="valor"
            label="Valor"
            type="number"
            placeholder="Ex: 1.500"
            decimal-currency-input
            :required="true" />

        <x-form.input
            name="data_recebimento"
            label="Data de recebimento"
            type="date"
            :required="true"
            :value="now()->format('Y-m-d')" />

        <x-form.select
            name="status"
            label="Status"
            :options="
            ['pendente' => 'Pendente', 
            'recebido' => 'Recebido', 
            'cancelado' => 'Cancelado']"
            placeholder="Selecione o status"
            required />

        <x-form.input
            name="fonte_pagadora"
            label="Fonte pagadora"
            type="text"
            :required="true" />

        <x-form.select
            name="metodo_recebimento"
            label="Método de recebimento"
            :options="
            ['cartao_credito' => 'Cartão de Crédito',
            'cartao_debito' => 'Cartão de Débito',
            'dinheiro' => 'Dinheiro',
            'pix' => 'Pix',
            'transferencia' => 'Transferência',
            'outro' => 'Outro']"
            placeholder="Selecione o status"
            required />

        <x-form.checkbox
            name="fixa"
            label="Receita fixa?"
            type="checkbox"
            :required="true" />
    </x-form.form>
</x-main>