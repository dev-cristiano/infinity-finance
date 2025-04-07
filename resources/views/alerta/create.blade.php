<x-main
    :button="['route' => route('alertas.store')]">

    <x-form.form
        title="Cadastre um novo alerta"
        description="Alertas de mensagens personalizadas via WhatsApp."
        :route="route('alertas.store')"
        method="POST"
        :back="route('alertas.index')">

        <x-form.input
            name="titulo"
            label="Título"
            type="text"
            placeholder="Nome do alerta"
            data-field-name="Nome completo"
            data-error-message="Por favor, informe seu nome completo"
            :required="true" />

        <x-form.input
            name="valor"
            label="Valor"
            type="text"
            placeholder="0.00"
            :required="true"
            decimal-currency-input />

        <x-form.input
            name="data_alerta"
            label="Data Alerta"
            type="text"
            placeholder="01/01/2025"
            required="true"
            data-date-input />

        <x-form.checkbox
            name="recorrente"
            label="Alerta Recorrente" />

        <x-form.input
            name="data_alerta_final"
            label="Ultimo Alerta"
            type="text"
            placeholder="26/04/2025"
            required="true"
            data-date-input />

        <x-form.textarea
            name="descricao"
            label="Descrição"
            type="text"
            placeholder="Descrição do Alerta" />
    </x-form.form>
</x-main>