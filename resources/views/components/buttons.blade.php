
@php
    $target = 
        $attributes->get('wire:click') 
        ?? $attributes->get('wire:target')
        ?? null;
@endphp

<button 
    {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center my-2 
                    md:px-2 md:py-1 lg:px-[10px] lg:py-[6px]
                    rounded-md font-light md:text-[10px] lg:text-[13px] 
                    transition-colors duration-200 text-white 
                    bg-sky-600 border border-sky-600 hover:bg-sky-700'
    ]) }}
>
    <span wire:loading.remove 
        wire:target="{{ $target }}"
    >
        {{ $slot }}
    </span>

    <svg wire:loading wire:target="{{ $target }}" wire:loading.class.remove="hidden" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
        </path>
    </svg>
</button>
