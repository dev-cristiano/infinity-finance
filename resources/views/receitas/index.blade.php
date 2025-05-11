<x-main
    title="Minhas Receitas"
    description="Visualize, edite e gerencie todas as suas receitas."
    btnText="Novo"
    :route="route('receitas.create')">

    <x-table.table>
        <x-slot name="head">
            <x-table.heading>#</x-table.heading>
            <x-table.heading>Descrição</x-table.heading>
            <x-table.heading>Valor</x-table.heading>
            <x-table.heading>Data Recebimento</x-table.heading>
            <x-table.heading>Fonte Pagadora</x-table.heading>
            <x-table.heading>Status</x-table.heading>
            <x-table.heading>Fixa</x-table.heading>
            <x-table.heading>Editar</x-table.heading>
            <x-table.heading>Apagar</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ($receitas as $receita)
            <x-table.row>
                <x-table.cell>{{ $receita->id }}</x-table.cell>
                <x-table.cell>{{ $receita->descricao }}</x-table.cell>
                <x-table.cell>{{ $receita->valor }}</x-table.cell>
                <x-table.cell>{{ $receita->data_recebimento }}</x-table.cell>
                <x-table.cell>{{ $receita->fonte_pagadora }}</x-table.cell>
                <x-table.cell>{{ $receita->status }}</x-table.cell>
                <x-table.cell>{{ $receita->fixa }}</x-table.cell>
                <x-table.cell><a class="text-blue-500" href="{{ route('receitas.edit', $receita->id) }}">Editar</a></x-table.cell>
                <x-table.cell>
                    <form action="{{ route('receitas.destroy', $receita->id) }}" method="POST" class="delete-form" data-url="{{ route('receitas.destroy', $receita->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </x-table.cell>
            </x-table.row>
            @endforeach
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-table.table>
</x-main>

<script src="{{ asset('js/deleteConfirm.js') }}"></script>