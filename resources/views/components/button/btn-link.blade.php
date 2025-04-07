@props([
'href' => '#',
'color' => 'green',
'outline' => false,
'icon' => true,
'size' => 'md',
])

@php
$baseColor = match($color) {
'green' => 'green-500',
'red' => 'red-600',
'yellow' => 'yellow-600',
'blue' => 'blue-600',
default => 'gray-600',
};

$bgClass = $outline
? "border border-{$baseColor} text-{$baseColor} bg-white hover:bg-{$baseColor} hover:text-white"
: "bg-{$baseColor} text-white hover:bg-{$baseColor}";

$sizeClass = match($size) {
'sm' => 'px-3 py-1.5 text-sm',
'md' => 'px-4 py-2 text-sm',
'lg' => 'px-5 py-3 text-base',
default => 'px-4 py-2 text-sm',
};
@endphp

<a href="{{ $href }}" class="inline-flex items-center justify-center rounded-md bg-green-500 hover:bg-green-600 text-white h-10 px-4 py-2 transition-colors">
    @if($icon)
    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" stroke-width="2"
        viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 4v16m8-8H4" />
    </svg>
    @endif
    {{ $slot }}
</a>