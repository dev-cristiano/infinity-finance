<x-main>
    @php
    $toast = session()->pull('toast');
    @endphp

    @if ($toast)
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Toast !== 'undefined') {
                Toast.fire({
                    icon: `{{ e($toast['type']) }}`,
                    title: `{{ e($toast['message']) }}`
                });
            } else {
                console.warn("Toast não foi definido. Verifique se SweetAlert2 está sendo importado corretamente no app.js.");
            }
        });
    </script>
    @endif
    <x-form.form
        title="Editando Alerta"
        description="Edite os dados do alerta"
        :route="route('alertas.update', $alerta->id)"
        method="PUT"
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
            :required="true"
            :value="old('titulo', $alerta->titulo ?? '')" />

        <x-form.input
            name="valor"
            label="Valor"
            :required="true"
            decimal-currency-input
            placeholder="Ex: 250,00"
            :value="old('valor', $alerta->valor ?? '')" />

        <x-form.input
            name="data_alerta"
            label="Data do Alerta"
            type="text"
            placeholder="Ex: 10/05/2025"
            required="true"
            data-date-input
            :value="old('data_alerta', $alerta->data_alerta ?? '')" />

        <x-form.checkbox
            name="recorrente"
            label="Alerta Recorrente"
            :checked="old('recorrente', $alerta->recorrente ?? false)"
            :value="old('recorrente', $alerta->recorrente ?? '')"
            id="recorrente" />

        <x-form.input
            name="data_alerta_final"
            label="Último Alerta"
            type="text"
            placeholder="Ex: 10/12/2025"
            required="true"
            data-date-input
            :value="old('data_alerta_final', $alerta->data_alerta_final ?? '')" />

        <x-form.textarea
            name="descricao"
            label="Descrição"
            type="text"
            placeholder="Ex: Alerta de vencimento da fatura do cartão Nubank todo dia 10"
            :value="old('descricao', $alerta->descricao ?? '')" />

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