
@props(['votes','showCheck'])

<div id="voting_left" class="mr-2 w-auto">
    
    <div class="flex flex-col items-center">
        
        <button wire:click="upvote" type="button" 
            class="rounded-full border border-gray-400 size-10 
            hover:bg-orange-200 active:bg-
            flex items-center justify-center
            p-2 m-[2px]"
        >
            <x-lucide-chevron-up class="w-6 h-6 text-gray-800" />
        </button>
        
        
        <div class="flex items-center justify-center h-10 p-2 m-[2px]">
            <span class="font-bold text-lg">{{$votes}}</span>
        </div>
        
        <button wire:click="downvote" type="button"
            class="rounded-full border border-gray-400 size-10
            hover:bg-orange-200
            flex items-center justify-center
            p-2 m-[2px] mb-3"
        >
            <x-lucide-chevron-down class="w-6 h-6 text-gray-800" />
        </button>

        {{-- bookmark --}}
        
        <button  type="button" class="py-1">
            <x-lucide-bookmark class="w-5 h-5 text-gray-400" />
        </button>
        
        @if ($showCheck)
            <x-lucide-check stroke-width="6" class="w-8 h-8 text-green-700 my-2"/>
        @endif                


        <div class="py-[6px] mx-auto">
            <a href="#">
                <x-lucide-clock class="w-5 h-5 text-gray-400 hover:text-sky-700" />
            </a>
        </div>

        
    </div>
</div>


