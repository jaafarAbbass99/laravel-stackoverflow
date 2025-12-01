<div class="w-full"
     x-data="{ open: false }"
     x-effect="open = $wire.suggestions.length > 0"
>
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
        <input type="text"
               wire:model.live="query"
               placeholder="Search tags..."
               class="block w-full rounded-md border border-gray-300 ps-10 pr-2 py-2 text-sm focus:ring-sky-500 focus:border-sky-500"
        />

        {{-- Icon --}}
        {{-- <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
            <svg class="size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div> --}}

        {{-- Suggestions --}}

        <ul x-show="open"
            x-transition
            class="absolute z-10 w-full bg-white border border-gray-200 rounded-md mt-1  shadow-md p-1 flex flex-wrap max-h-60 overflow-y-auto">
            
            <template x-for="tag in $wire.suggestions" :key="tag.id">
                <li @click="$wire.selectTag(tag.id)"
                    class="w-60 text-xs  hover:bg-gray-200 p-3 cursor-pointer ">
                    <span x-text="tag.name" class="inline-block bg-gray-100 font-bold p-1 rounded-sm mb-2"></span>
                    <p x-text="tag.description" class=" line-clamp-4 " ></p>
                </li>
            </template>
                
            
        </ul>

        
    </div>

    
</div>
