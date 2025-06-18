@props([
    'type' => 'password',
    'placeholder',
    'class',
    'fieldgroup',
    'name',
    'label',
])

<div class="{{ $fieldgroup }}"
     x-data="{ show: false }">
    @if ($label)
        <label for="{{ $name }}"
               class="block mb-1 font-bold text-sm text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="input-group">
        <input :type="show ? 'text' : 'password'"
               placeholder="{{ $placeholder }}"
               class="{{ $class }} @error($name) is-invalid @enderror"
               id="{{ $name }}"
               name="{{ $name }}"
               wire:model.defer="{{ $name }}"
               @input="$wire.clearError('{{ $name }}')">
        <span class="input-group-text toggle-password "
              @click="show = !show"><i :class="show ? 'ri-eye-off-line' : 'ri-eye-line'"
               class="cursor-pointer"></i></span>
        @error($name)
            <x-error-text message="{{ $message }}" />
        @enderror
    </div>
</div>
