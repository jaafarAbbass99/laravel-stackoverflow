
@props(['author', 'date', 'body', 'votes' => 0])


<div id="comment-details" class="mb-2">

    <div class="flex">
        <a href="" id="user-left" class="w-6 h-6 mr-2" >
            <img src="{{asset('FtkjC.jpg')}}" alt="user_img" class="w-6 h-6 rounded-sm">
        </a>
        <div class="h-6 mb-2 flex items-center justify-start">
            <a id="name" href="" class="text-xs text-sky-600 mr-2 {{$isAuthor ? 'bg-sky-100' :''}} ">{{$author}}</a>
            <a id="date" href="" class="text-xs text-gray-500 mr-2">{{$date}}</a>
        </div>
    </div>

    <div id="user-right" class="flex">

        <div class="w-6 shrink-0 mr-2 flex justify-center"></div>

        <div id="comment-body">
            <p class="text-sm mb-2 mr-2 " >
                {{$body}}
            </p>
            <div id="interactive">
                <button id="vote to comment" type="button" class="px-2 py-[2px] border border-gray-400 
                hover:bg-gray-50 
                max-w-19
                rounded-sm">
                    <div class="flex items-center justify-center">
                        <x-lucide-chevron-up class="w-5 h-5 max-w-5 shrink-0 mx-1 text-gray-800" />
                        <span class="text-sm mr-1  ">{{$votes}}</span>
                    </div>
                </button>
    
            </div>
        </div>

        
    </div>

</div>