<x-main
    title="Meus Alertas"
    description="Visualize, edite e gerencie todos os seus alertas personalizados."
    :buttons="[
        [
            'title' => 'Novo Alerta',
            'route' => route('alertas.create'),
            'color' => 'red',
            'icon' => true,
            'outline' => false,
            'size' => 'md',
        ]
    ]">
    <x-table.table
        addButtonRoute="{{ route('alertas.create') }}">
        <x-slot name="head">
            <x-table.heading>#</x-table.heading>
            <x-table.heading>Titulo</x-table.heading>
            <x-table.heading>Descrição</x-table.heading>
            <x-table.heading>Valor</x-table.heading>
            <x-table.heading>Data Alerta</x-table.heading>
            <x-table.heading>Data Final</x-table.heading>
            <x-table.heading>Recorrente</x-table.heading>
            <x-table.heading>Editar</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ($alertas as $alerta)
            <x-table.row>
                <x-table.cell>{{ $alerta->id }}</x-table.cell>
                <x-table.cell>{{ $alerta->titulo }}</x-table.cell>
                <x-table.cell>{{ $alerta->descricao }}</x-table.cell>
                <x-table.cell>{{ $alerta->valor }}</x-table.cell>
                <x-table.cell>{{ $alerta->data_alerta }}</x-table.cell>
                <x-table.cell>{{ $alerta->data_alerta_final }}</x-table.cell>
                <x-table.cell>{{ $alerta->recorrente }}</x-table.cell>
                <x-table.cell><a class="text-blue-500" href="{{ route('alertas.edit', $alerta->id) }}">Editar</a></x-table.cell>
            </x-table.row>
            @endforeach
        </x-slot>
    </x-table.table>
</x-main>