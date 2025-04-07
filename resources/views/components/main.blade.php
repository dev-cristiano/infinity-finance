@extends('layouts.app')
@section('content')

@props([
'title' => '',
'description' => '',
'buttons' => [],
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

        @if(count($buttons))
        <div class="flex flex-wrap gap-2">
            @foreach($buttons as $button)
            <x-button.btn-link
                :href="$button['route'] ?? '#'"
                :color="$button['color'] ?? 'green'"
                :icon="$button['icon'] ?? true"
                :outline="$button['outline'] ?? false"
                :size="$button['size'] ?? 'md'">
                {{ $button['title'] ?? 'Novo Item' }}
            </x-button.btn-link>
            @endforeach
        </div>
        @endif
    </div>

    {{ $slot }}
</main>

@endsection