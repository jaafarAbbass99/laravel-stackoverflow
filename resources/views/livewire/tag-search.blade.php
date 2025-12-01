<div class="w-full"
     x-data="{ open: false , loading: false }"
     x-effect="open = ($wire.suggestions.length > 0)">
    
    {{-- Selected Tags --}}
    <div class="flex flex-wrap gap-2 mb-2">
        @foreach ($selectedTags as $tag)
            <span class="bg-sky-100 text-sky-700 text-xs font-medium px-2.5 py-1 rounded-full flex items-center gap-1">
                {{ $tag['name'] }}
                <button type="button" wire:click="removeTag({{ $tag['id'] }})" class="text-sky-600 hover:text-sky-900">
                    &times;
                </button>
            </span>
        @endforeach
    </div>

    {{-- Search Input --}}
    <div class="relative">
        
        <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
            <svg class="md:size-[13px] lg:size-[18px] text-gray-900 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>

        <input  type="text" 
                wire:model.live="query"
                class="block w-full ps-9 md:py-1 lg:py-2
                md:text-[11px] lg:text-sm text-gray-900 font-normal
                border border-gray-300 focus:outline-2 focus:outline-offset-2 focus:outline-sky-500
                rounded-md bg-white"
                placeholder="Search tags..." 
            />
       

        {{-- Suggestions --}}
        <ul x-show="open"
            x-transition
            class="absolute z-10 w-full bg-white border border-gray-200 rounded-md mt-1  shadow-md p-1 flex flex-wrap max-h-60 overflow-y-auto">
            
            <template x-if="$wire.suggestions.length > 0">
                <template x-for="tag in $wire.suggestions" :key="tag.id">
                    <li @click="$wire.selectTag(tag.id)"
                        
                        class="w-60 text-xs hover:bg-gray-200 p-3 cursor-pointer">
                        <span x-text="tag.name" class="inline-block bg-gray-100 font-bold p-1 rounded-sm mb-2"></span>
                        <p x-text="tag.description" class="line-clamp-4"></p>
                    </li>
                </template>
            </template>     
        </ul>
    
    </div>
    
    {{-- لا توجد نتائج --}}
    @if (empty($suggestions) && strlen($query) > 0)
        <span class="text-center w-full py-3 text-gray-500 text-sm select-none">
            No results found
        </span>
    @endif
    
</div>
