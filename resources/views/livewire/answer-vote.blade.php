
<div id="voting_left" class="mr-2 w-auto">
    
    <x-alert-error />

    <div x-data="{ localVotes: @entangle('votesCount') }"
        x-on:revert-upvote.window="localVotes--"
        x-on:revert-downvote.window="localVotes++"
        class="flex flex-col items-center">
        
        <button 
        @click.prevent="localVotes++;
                $wire.upvote();"
            type="button" 
            @class([
                'rounded-full border border-gray-400 size-10 flex items-center justify-center p-2 m-[2px]',
                'bg-red-50 border-orange-300' => $vote_type == 1 ,
                'hover:bg-red-50'
             ])
        >
            <x-lucide-chevron-up class="w-6 h-6 text-gray-800" />
        </button>
        
        
        <div class="flex items-center justify-center h-10 p-2 m-[2px]">
            <span class="font-bold text-lg" x-text="localVotes"></span>
        </div>
        
        <button @click.prevent="localVotes--;
            $wire.downvote();"
            type="button"
            @class([
                'rounded-full border border-gray-400 size-10 flex items-center justify-center p-2 m-[2px]',
                'bg-red-50 border-orange-300' => $vote_type == -1 ,
                'hover:bg-red-50'
             ])
        >
            <x-lucide-chevron-down class="w-6 h-6 text-gray-800" />
        </button>

        {{-- bookmark --}}
        
        <button  type="button" class="py-1">
            <x-lucide-bookmark class="w-5 h-5 text-gray-400" />
        </button>
        
        @if ($accepted)
            <x-lucide-check stroke-width="6" class="w-8 h-8 text-green-700 my-2"/>
        @elseif (!$questionAnswered && $canAcceptAnswer)
            <button wire:click="makeAccepted" type="button" class=" cursor-pointer">
                <x-lucide-check stroke-width="6" class="w-8 h-8 text-gray-300 my-2"/>
            </button>
        @endif               

        <div class="py-[6px] mx-auto">
            <a href="#">
                <x-lucide-clock class="w-5 h-5 text-gray-400 hover:text-sky-700" />
            </a>
        </div>
        
    </div>
</div>







