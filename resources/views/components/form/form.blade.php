@props([
'title' => '',
'description' => '',
'route',
'method' => 'POST',
'back' => null,
])

<div class="bg-white rounded-lg shadow-lg w-full max-w-xl mx-auto p-6">
    @if($title)
    <h2 class="text-xl font-bold">{{ $title }}</h2>
    @endif
    @if($description)
    <p class="mb-5 text-sm text-gray-500">{{ $description ?? '' }}</p>
    @endif

    <form action="{{ $route }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}">
        @if (!in_array($method, ['GET', 'POST']))
        @method($method)
        @endif

        {{ $slot }}

        <div class="flex justify-end gap-3 mt-6">
            @if($back)
            <a href="{{ $back }}" class="inline-flex items-center justify-center whitespace-nowrap gap-1 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>

                Voltar
            </a>
            @endif

            <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap gap-1 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path fill-rule=" evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                </svg>
                Salvar
            </button>
        </div>
    </form>
</div>