@props([
'id' => '',
'title' => '',
'subtitle' => '',
'width' => 'max-w-xl'
])

<div id="{{ $id }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full {{ $width }} mx-4">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>
            @if($subtitle)
            <p class="text-gray-500 mb-6">{{ $subtitle }}</p>
            @endif

            {{ $slot }}
        </div>
    </div>
</div>