@props([
'name',
'label' => null,
'checked' => false,
'required'
])

<div class="mb-4 flex items-center gap-2">
    <input type="hidden" name="{{ $name }}" value="0" />

    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        {{ old($name, $checked) ? 'checked' : '' }}
        {{ $attributes->merge([
            'class' => 'rounded text-green-600 border-gray-300 focus:ring-green-500'
        ]) }}>

    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
    @endif

    @error($name)
    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>