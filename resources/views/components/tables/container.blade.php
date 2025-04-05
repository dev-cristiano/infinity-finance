@props([
'title' => '',
'viewAllLink' => '#',
'viewAllText' => 'Ver Todos'
])

<div class="mt-8">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-5 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
            <a href="{{ $viewAllLink }}" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">{{ $viewAllText }}</a>
        </div>
        <div class="p-5">
            <div class="overflow-x-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>