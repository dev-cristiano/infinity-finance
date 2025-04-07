<x-main
    title="Minhas Receitas"
    description="Gerencie suas receitas"
    :buttons="[
        [
            'title' => 'Nova Receita',
            'route' => route('receitas.create'),
            'color' => 'red',
            'icon' => true,
            'outline' => false,
            'size' => 'md',
        ]
    ]" />

<x-table.table>
    <x-slot name="head">
        <x-table.heading>Data</x-table.heading>
        <x-table.heading>Descrição</x-table.heading>
    </x-slot>

    <x-slot name="body">
        <x-table.row>
            <x-table.cell>Teste 1</x-table.cell>
            <x-table.cell>Teste 2</x-table.cell>
        </x-table.row>
    </x-slot>
</x-table.table>