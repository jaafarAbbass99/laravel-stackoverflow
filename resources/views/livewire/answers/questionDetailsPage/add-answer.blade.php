
<div>
    <x-toast-message />
    
    <h1 class="text-lg my-2" > Your Answer</h1>

    <form wire:submit.prevent="createAnswer">

        <x-textarea
            wire:model.defer="description" 
            placeholder="Write your answer..." 
            minChars="15"
            rows="6"
        />

        <x-buttons type="submit"  wire:target="createAnswer" class="w-[180px]">
            Post Your Answer
        </x-buttons>

    </form>
    
</div>
