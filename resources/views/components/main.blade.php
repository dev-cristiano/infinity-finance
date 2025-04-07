@extends('layouts.app')
@section('content')

@props([
'title' => '',
'description' => '',
])

<main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col sm:flex-row items-start justify-between w-full">
        <!-- Bloco do título e descrição -->
        <div class="flex-1 mb-4 sm:mb-0">
            @if($title)
            <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
            @endif
            @if($description)
            <p class="mt-1 text-sm text-gray-500">{{ $description }}</p>
            @endif
        </div>

        <!-- Bloco dos botões usando slot -->
        @if(isset($actions))
        <div class="flex flex-wrap gap-2 self-start sm:self-center sm:justify-end sm:flex-shrink-0">
            {{ $actions }}
        </div>
        @endif
    </div>

    <!-- Slot principal para o conteúdo -->
    {{ $slot }}
</main>

@endsection