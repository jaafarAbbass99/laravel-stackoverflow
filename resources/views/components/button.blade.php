@props(['href', 'text', 'variant' => 'primary', 'icon' => null, 'iconPosition' => 'left'])

@php
    $base = 'inline-flex w-auto whitespace-nowrap items-center justify-center gap-1 md:px-2 md:py-1 lg:px-[10px] lg:py-[6px] rounded-md font-light md:text-[10px] lg:text-[13px] transition-colors duration-200';
    $variants = [
        'primary' => 'text-white bg-sky-600 border border-sky-600 hover:bg-sky-700',
        'outline' => 'text-sky-600 border border-sky-600 hover:bg-sky-50',
        
    ];
@endphp

<a href="{{ $href }}" class="{{ $base }} {{ $variants[$variant] ?? '' }}">
    {{-- Icon before text --}}
    @if ($icon && $iconPosition === 'left')
        <x-dynamic-component :component="'lucide-' . $icon" class="w-4 h-4" />
    @endif

    {{ $text }}

    {{-- Icon after text --}}
    @if ($icon && $iconPosition === 'right')
        <x-dynamic-component :component="'lucide-' . $icon" class="w-4 h-4" />
    @endif
</a>
