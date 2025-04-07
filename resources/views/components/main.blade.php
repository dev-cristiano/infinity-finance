@extends('layouts.app')
@section('content')

@props([
'title' => '',
'description' => '',
'btnText' => '',
'route' => '',
])

<div class="mb-6 flex flex-col sm:flex-row items-start justify-between w-full">
    <!-- Bloco do título e descrição -->
    <div>
        @if($title)
        <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
        @endif
        @if($description)
        <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
        @endif
    </div>

    <!-- Bloco dos botões usando slot -->
    @if ($btnText)
    <a href="{{ $route }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus mr-2 h-4 w-4">
            <path d="M5 12h14"></path>
            <path d="M12 5v14"></path>
        </svg>
        {{ $btnText }}
    </a>
    @endif

</div>

<!-- Slot principal para o conteúdo -->
{{ $slot }}

@endsection