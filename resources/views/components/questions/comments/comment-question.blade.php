
@props(['comment', 'isAuthor' => false])

<p class="p-2 text-sm border-b">
    
    <span>
        {{$comment->commentText}}
    </span>

    <span>-</span>
    <span class="mr-1 {{$isAuthor ? 'bg-sky-100' :''}}">
        <a href="" class="text-sky-600">{{$author}}</a> 
    </span>
    <span class="mr-1">
        <a href="" class="text-gray-400">{{$date}}</a> 
    </span>
    @if($isAuthor)
        <span class="mr-1 h-6 w-6 inline-block text-center leading-[24px]">
            {{-- button for edit comment --}}
            <button class="text-gray-500 hover:text-gray-700 text-sm"
                @click.prevent="startEdit({{$comment->id}},'{{ addslashes($comment->commentText) }}')"  
            >
                <x-lucide-pen class="w-4 h-4 cursor-pointer inline-block" />
            </button>
        </span>
        <span class="mr-1 h-6 w-6 inline-block text-center leading-[24px]">
            <button class="text-red-500 hover:text-red-700 text-sm"
                @click="if(confirm('Are you sure?')) { $wire.deleteComment({{ $comment->id }})}"
            >
                <x-lucide-trash class="w-4 h-4 cursor-pointer inline-block" />
            </button>
        </span>
    @endif
</p>
 