@props([
'title' => '',
'description' => '',
'button' => [
'show' => true,
'title' => 'Novo Item',
'route' => '#',
'icon' => true,
'color' => 'green'
]
])

<main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            @if($title)
            <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
            @endif

            @if($description)
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
            @endif
        </div>

        @if($button['show'])
        <div class="relative">
            <a href="{{ $button['route'] }}"
                class="inline-flex items-center justify-center gap-2 rounded-md 
                          bg-{{ $button['color'] }}-500 hover:bg-{{ $button['color'] }}-600 
                          text-white h-10 px-4 py-2 transition-colors">
                @if($button['icon'])
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
                @endif
                {{ $button['title'] }}
            </a>
        </div>
        @endif
    </div>

    {{ $slot }}
</main>