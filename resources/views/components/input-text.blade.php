@props(['type', 'placeholder', 'class', 'fieldgroup', 'name', 'label'])

<div class="{{ $fieldgroup }}">
    @if ($label)
        <label for="{{ $name }}"
               class="block mb-1 font-bold text-sm text-gray-700">
            {{ $label }}
        </label>
    @endif

    <input type="{{ $type }}"
           placeholder="{{ $placeholder }}"
           class="{{ $class }} @error($name) is-invalid @enderror"
           id="{{ $name }}"
           name="{{ $name }}"
           @input="$wire.clearError('{{ $name }}')"
           wire:model.defer="{{ $name }}" />

    @error($name)
        <x-error-text message="{{ $message }}" />
    @enderror
</div>
