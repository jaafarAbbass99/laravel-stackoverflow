
@props(['comments' => []])

<section x-data='{ open : true }'>           
    <button type="button" data-target="comments-container" @click='open=!open' class="cursor-pointer">
        <div class="flex items-center justify-center" >
            <div class="text-lg">
                <span class="mr-2" > {{count($comments)}} Comment(s)</span>
            </div>
            <x-lucide-chevron-up x-show='!open' id="icon-up" class="w-5 h-5 mx-1 text-gray-800" />
            <x-lucide-chevron-down x-show='open' id="icon-down" class=" w-5 h-5 mx-1 text-gray-800" />
        </div>
    </button>

    <input type="text" placeholder="Add a comment" class="my-3 placeholder-gray-600 border border-gray-400 rounded-sm px-3 py-1 w-full hover:bg-gray-50">
    
    <div x-show='open'  id="comments-container" >
        {{-- comment  --}}
        @foreach ($comments as $comment)
            <x-comment-answer wire:key="{{$comment->id}}" author="Ali" :body=" $comment->comment_text " :date="$comment->created_at" :votes="$comment->votes_count" :isAuthor="$comment->added_by===auth('web')->id() ? true : false " />
            {{-- <x-comment-answer wire:key='{{$comment['id']}}' :author="$comment['author']" :body="$comment['body']" :date="$comment['date']" :votes="$comment['votes']" :isAuthor="$comment['isauthor']" /> --}}
        @endforeach

    </div>
    
</section>
