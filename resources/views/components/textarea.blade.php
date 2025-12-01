@props([
    'label' => '',
    'placeholder' => '',
    'required' => false,
    'minChars' => 15,
    'rows' => 3,
])
@php
    // الحصول على القيمة داخل wire:model مهما كان اسمها
    $model = $attributes->wire('model')->value();
@endphp

<div x-data="{ charsCount:0} " class="mb-4">
    @if($label)
        <div class="flex items-center">
            <label class="block font-semibold">{{ $label }}</label>
            @if($required)
                <span class="text-red-600 ml-1">*</span>
            @endif
        </div>
    @endif

    <textarea
        x-model="{{ $model }}"
        @input="charsCount = {{ $model }}.length"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        class="w-full border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500 rounded p-2 text-sm"
        {{ $attributes }}
    ></textarea>

    @error($model)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <div class="text-sm text-gray-500 mt-1">
        <template x-if="charsCount == 0">
            <span>Enter at least {{ $minChars }} characters</span>
        </template>
        <template x-if="charsCount > 0 && charsCount < {{ $minChars }}">
            <span x-text="{{ $minChars }} - charsCount + ' more to go...'"></span>
        </template>
    </div>
</div>
