@props(['href', 'icon' => '', 'active' => false])

@php
$classes = $active
    ? 'bg-gray-200 font-bold visited:text-black'
    : 'text-gray-600 hover:bg-gray-100 hover:text-black';
@endphp

<a href="{{ $href }}" 
   class="inline-flex items-center justify-start
          w-full px-1 py-1 text-sm rounded-md transition-colors duration-150
          {{ $classes }}">
   
   @if($icon)
       <x-dynamic-component :component="'lucide-' . $icon" class="m-1 w-4 h-4" />
   @endif

   <span>{{ $slot }}</span>
</a>
