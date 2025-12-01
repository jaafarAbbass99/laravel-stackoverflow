
<div>
    <div class="border-t">
        @foreach ($comments as $comment)
            <x-comment-question :comment="$comment['body']" :author="$comment['author']" :isAuthor="$comment['isauther']" :date="$comment['date']" />
        @endforeach         
     </div>
     <a href="" class="text-sm text-gray-400 hover:text-sky-300">Add a comment</a>

</div>