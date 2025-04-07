@props([
'name',
'label' => null,
'type' => 'text',
'placeholder' => '',
'required' => false,
'value' => null,
])

<div class="mb-6" id="grupo_{{ $name }}">
    @if($label)
    <label for="{{ $name }}" id="lb_{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        value="{{ old($name, $value) }}"
        {{ $attributes->merge([
            'class' => 'w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 ' .
                       ($errors->has($name) ? 'border-red-500' : 'border-gray-300')
        ]) }}>

    @error($name)
    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>