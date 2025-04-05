@props([
'name' => '',
'label' => '',
'options' => [],
'required' => false,
'selected' => '',
'addButton' => null
])

<div class="mb-6">
    <div class="flex justify-between items-center mb-2">
        @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }} @if($required) <span class="text-red-500">*</span> @endif
        </label>
        @endif

        @if($addButton)
        <button type="button" onclick="{{ $addButton['action'] }}"
            class="text-xs text-green-600 hover:text-green-500 hover:underline focus:outline-none">
            {{ $addButton['text'] }}
        </button>
        @endif
    </div>

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500']) }}>
        {{ $slot }}

        @foreach($options as $value => $text)
        <option value="{{ $value }}" @if($selected==$value) selected @endif>{{ $text }}</option>
        @endforeach
    </select>

    @if(isset($helpText))
    <p class="mt-1 text-xs text-gray-500">
        {{ $helpText }}
    </p>
    @endif
</div>