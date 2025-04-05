@props([
'type' => 'success', // 'success' ou 'danger'
'text' => ''
])

@php
$classes = [
'success' => 'bg-green-100 text-green-800',
'danger' => 'bg-red-100 text-red-800'
][$type] ?? 'bg-gray-100 text-gray-800';
@endphp

<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $classes }}">
    {{ $text }}
</span>