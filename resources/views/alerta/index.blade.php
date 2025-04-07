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

</x-main>