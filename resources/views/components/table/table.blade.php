@props([
'title' => null,
'description' => null,
'addButtonRoute' => null,
'addButtonText' => 'Ver Todos',
'paginator' => null,
'footer' => null,
])

<div class="mt-8">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        @if ($addButtonRoute)
        <div class="px-5 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
            <a href="{{ $addButtonRoute }}" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">
                {{ $addButtonText }}
            </a>
        </div>
        @endif

        <div class="p-5">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        {{ $head }}
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        {{ $body }}
                    </tbody>
                </table>
            </div>

            @if ($paginator)
            <div class="flex items-center justify-center mt-4 space-x-2">
                {{ $paginator->onEachSide(1)->links('pagination::simple') }}
            </div>
            @endif

            @if (isset($footer))
            <div class="mt-4">
                {{ $footer }}
            </div>
            @endif
        </div>
    </div>
</div>