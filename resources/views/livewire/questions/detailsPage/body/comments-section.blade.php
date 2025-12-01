
<div x-data="{
    showForm:false ,
    textComment:'' ,
    charsCount:0 ,
    editingId:null,
    mode:'add',

    startEdit(id,text){
        this.mode='edit';
        this.editingId=id;
        this.textComment=text;
        this.charsCount=text.length;
        this.showForm=true;
    },
    startAdd(){
        this.mode='add';
        this.textComment='';
        this.charsCount=0;
        this.showForm=true;
    },
}"
x-init="
    // ⭐ الاستماع لإشارة Livewire
    window.addEventListener('reset-comment', () => {
        showForm = false;
        mode = 'add';
        textComment = '';
        charsCount = 0;
    });
"
>

    {{-- LIST OF COMMENTS --}}
    <div class="border-t">
        @forelse ($comments as $comment)
            <x-comment-question 
                :comment="$comment"
                :author="$comment->author"
                :isAuthor="$comment->authorId == Auth::id()"
                :date="$comment->createdAt" 
            />
        @empty
        <p class="text-gray-500 text-sm border-b mb-2">No comments yet.</p>
        @endforelse
        {{ $comments->links() }}
    </div>
    
    @if ($QuestionIsNotOpen)
        <p class="text-gray-500 text-sm" >
            Comments disabled on deleted / locked posts / reviews
        </p>
    @else
        {{-- Add Comment Link --}}
        <a href="#"
            @click.prevent="startAdd()"
            x-show="!showForm"
            class="text-sm text-gray-400 hover:text-sky-400"
            >
            Add a comment
        </a>    
        {{-- form add comment --}}
        <div x-show="showForm" x-transition class="mt-2 space-y-2">
            
            <x-textarea
                wire:model="textComment" 
                placeholder="Write your comment..." 
                minChars="15"
            />
            
            {{-- BUTTONS --}}
            <div class="flex gap-2">
                <button 
                    x-show="mode == 'add'"
                    wire:click="addComment()"
                    class="bg-sky-600 text-white text-sm px-3 py-1 rounded-md hover:bg-sky-700"
                    wire:loading.remove
                    wire:target="addComment,updateComment"
                >
                <div 
                    class="hidden"
                    wire:loading
                    wire:loading.class.remove="hidden"
                    wire:target="addComment,updateComment"
                >
                    <svg class="animate-spin h-5 w-5 text-sky-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                        </path>
                    </svg>
                </div>
                    Add Comment
                </button>

                <button 
                    class="hidden bg-gray-300 text-gray-700 text-sm px-3 py-1 rounded-md"
                    wire:loading
                    wire:loading.class.remove="hidden"
                    wire:loading.class.add="inline-flex"
                    wire:target="addComment,updateComment"
                    disabled
                >
                    Loading...
                </button>

                <button 
                    x-show="mode == 'edit'"
                    @click="$wire.updateComment(editingId,textComment);"
                    class="bg-sky-600 text-white text-sm px-3 py-1 rounded-md hover:bg-sky-700"
                    wire:loading.remove
                    wire:target="addComment,updateComment"
                    >
                    Save
                </button>

                <button 
                    @click="showForm=false"
                    class="text-gray-500 text-sm hover:text-sky-400">
                    Cancel
                </button>
            </div>
        </div>
    @endif
</div>

