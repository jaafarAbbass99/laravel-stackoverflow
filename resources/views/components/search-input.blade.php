

@props([
    'placeholder' => 'Search...', // قيمة افتراضية
    'id' => 'search-input',
])

<div class="relative w-full">
    {{-- أيقونة البحث --}}
    <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
        <svg class="md:size-[13px] lg:size-[18px] text-gray-600 dark:text-gray-400" 
             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" 
             viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                  stroke-width="1.5" 
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
    </div>

    {{-- حقل الإدخال --}}
    <input 
        type="search" 
        id="{{ $id }}"
        {{ $attributes->merge([
            'class' => 'block w-full ps-10 md:py-1 lg:py-2 pr-2
                        md:text-[11px] lg:text-sm text-gray-900 font-normal
                        border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
                        rounded-md bg-white'
        ]) }}
        placeholder="{{ $placeholder }}" 
        required 
    />
</div>
