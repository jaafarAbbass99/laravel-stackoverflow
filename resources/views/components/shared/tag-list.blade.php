
<div class="flex flex-wrap mt-6 mb-6">
    @foreach ($tags as $tag)
        <div class="relative inline-block mr-2 mb-2"
             x-data="{ open: false }"
             @mouseenter="open = true"
             @mouseleave="open = false">

            <a href="{{ url('/tags/' . $tag->id) }}"
               class="px-2 py-1 bg-gray-200 rounded-sm font-semibold text-sm text-gray-700 hover:text-gray-950">
               {{ $tag->name }}
            </a>
            <!-- Tooltip -->
            <div x-show="open"
                 x-transition
                 class="absolute z-50 mt-1 w-48 p-2 bg-gray-800 text-white text-xs rounded shadow-lg"
                 style="display: none;">
                <p>{{ $tag->description }}</p>
                <p class="text-gray-300 text-xs mt-1">
                    Used in {{ $tag->questionsCount ?? 0 }} questions 
                </p>
            </div>


        </div>
    @endforeach
</div>

