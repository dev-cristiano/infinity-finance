<x-main>
    <x-form.form
        title="Editando Receita"
        description="Gerencie suas receitas"
        :route="route('receitas.update', $receita->id)"
        method="PUT"
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
            :required="true"
            :value="old('descricao', $receita->descricao ?? '')" />

        <x-form.input
            name="valor"
            label="Valor"
            type="number"
            placeholder="Ex: 1500"
            :required="true"
            :value="old('valor', $receita->valor ?? '')" />

        <x-form.input
            name="data_recebimento"
            label="Data de recebimento"
            type="date"
            :required="true"
            :value="old('data_recebimento', $receita->data_recebimento ?? '')" />

        <x-form.select
            name="status"
            label="Status"
            :options="
            ['pendente' => 'Pendente', 
            'recebido' => 'Recebido', 
            'cancelado' => 'Cancelado']"
            placeholder="Selecione o status"
            :selected="old('status', $receita->status ?? '')"
            required />

        <x-form.input
            name="fonte_pagadora"
            label="Fonte pagadora"
            type="text"
            :value="old('fonte_pagadora', $receita->fonte_pagadora ?? '')"
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
            :selected="old('metodo_recebimento', $receita->metodo_recebimento ?? '')"
            required />

        <x-form.checkbox
            name="fixa"
            label="Receita fixa?"
            type="checkbox"
            :checked="old('fixa', $receita->fixa ?? '')"
            :required="true" />
    </x-form.form>
</x-main>