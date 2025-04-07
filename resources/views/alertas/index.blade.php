<x-main
    title="Meus Alertas"
    description="Visualize, edite e gerencie todos os seus alertas personalizados."
    btnText="Novo"
    :route="route('alertas.create')">

    <x-table.table>
        <x-slot name="head">
            <x-table.heading>#</x-table.heading>
            <x-table.heading>Titulo</x-table.heading>
            <x-table.heading>Descrição</x-table.heading>
            <x-table.heading>Valor</x-table.heading>
            <x-table.heading>Status</x-table.heading>
            <x-table.heading>Data Alerta</x-table.heading>
            <x-table.heading>Data Final</x-table.heading>
            <x-table.heading>Recorrente</x-table.heading>
            <x-table.heading>Editar</x-table.heading>
            <x-table.heading>Apagar</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @foreach ($alertas as $alerta)
            <x-table.row>
                <x-table.cell>{{ $alerta->id }}</x-table.cell>
                <x-table.cell>{{ $alerta->titulo }}</x-table.cell>
                <x-table.cell>{{ \Illuminate\Support\Str::limit($alerta->descricao, 40, ' (...)') }}</x-table.cell>
                <x-table.cell>{{ $alerta->valor }}</x-table.cell>
                <x-table.cell>{{ $alerta->data_atual_status }}</x-table.cell>
                <x-table.cell>{{ $alerta->data_alerta }}</x-table.cell>
                <x-table.cell>{{ $alerta->data_alerta_final }}</x-table.cell>
                <x-table.cell>{{ $alerta->alerta_recorrente }}</x-table.cell>
                <x-table.cell><a class="text-blue-500" href="{{ route('alertas.edit', $alerta->id) }}">Editar</a></x-table.cell>
                <x-table.cell>
                    <form action="{{ route('alertas.destroy', $alerta->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este alerta?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                    </form>
                </x-table.cell>
            </x-table.row>
            @endforeach
        </x-slot>
        <x-slot name="footer">
            {{ $alertas->links() }}
        </x-slot>
    </x-table.table>
</x-main>