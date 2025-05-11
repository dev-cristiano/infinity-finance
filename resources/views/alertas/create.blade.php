<x-main
    :button="['route' => route('alertas.store')]">

    <x-form.form
        title="Cadastre um novo alerta"
        description="Alertas de mensagens personalizadas via WhatsApp."
        :route="route('alertas.store')"
        method="POST"
        :back="route('alertas.index')">

        <x-form.input
            name="user_id"
            :value="Auth::user()->id"
            type="hidden" />

        <x-form.input
            name="titulo"
            label="Título"
            type="text"
            placeholder="Ex: Cartão de crédito Nubank"
            data-field-name="Nome completo"
            :required="true" />

        <x-form.input
            name="valor"
            label="Valor"
            :required="true"
            decimal-currency-input
            placeholder="Ex: 250,00"
            decimal-currency-input />

        <x-form.input
            name="data_alerta"
            label="Data do Alerta"
            type="date"
            :value="now()->format('Y-m-d')"
            placeholder="Ex: 10/05/2025"
            required="true"
            data-date-input />

        <x-form.checkbox
            name="recorrente"
            label="Alerta Recorrente"
            :checked="old('recorrente', $alerta->recorrente ?? false)"
            id="recorrente"
            :checked="old('recorrente', $alerta->recorrente ?? false)" />


        <x-form.input
            name="data_alerta_final"
            label="Último Alerta"
            type="text"
            placeholder="Ex: 10/12/2025"
            required="true"
            data-date-input />

        <x-form.textarea
            name="descricao"
            label="Descrição"
            type="text"
            placeholder="Ex: Alerta de vencimento da fatura do cartão Nubank todo dia 10" />
    </x-form.form>
</x-main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('recorrente');
        const grupoInput = document.getElementById('grupo_data_alerta_final');
        const valor = document.getElementById('valor');

        function toggleInput() {
            if (!checkbox.checked) {
                grupoInput.style.display = 'none';
                grupoInput.querySelector('input').removeAttribute('required');
                grupoInput.querySelector('input').value = '';
            } else {
                grupoInput.style.display = 'block';
                grupoInput.querySelector('input').setAttribute('required', 'required');
            }
        }

        // Executa no carregamento inicial
        toggleInput();

        // Adiciona evento ao checkbox
        checkbox.addEventListener('change', toggleInput);
    });
</script>