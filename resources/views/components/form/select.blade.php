@props([
'name',
'label' => null,
'options' => [],
'selected' => null,
'placeholder' => 'Selecione uma opção',
'class' => '',
'id' => null,
'required' => false
])

<div class="mb-6">
    @if($label)
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700 mb-2">
        {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 {{ $class }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}>
        <option value="">{{ $placeholder }}</option>

        @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
        @endforeach
    </select>
</div>