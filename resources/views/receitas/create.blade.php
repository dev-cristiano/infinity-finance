<x-main
    title="Minhas Receitas"
    description="Cadastro de Receitas"
    :button="['route' => route('receitas.store')]">

    <x-form.form
        title="Nova Receita"
        :route="route('receitas.store')"
        method="POST"
        :back="route('receitas.index')">

        <x-form.input
            name="amount"
            label="Quantia"
            type="number"
            placeholder="0.00"
            :required="true" />

        
    </x-form.form>
</x-main>