{{-- @props(['title','asked','modified','views']) --}}


<header class="mb-4">
    <div class="flex items-start justify-between">
        <h1 class="mb-2 text-gray-700 text-[28px] leading-snug ">
            {{$title}}
        </h1>
 
        <div class="ml-2">
            <x-button 
            href="{{ route('questions.create') }}" 
            text="Ask Questions" 
            variant="primary" 
            />
        </div>

    </div>

    <div class="flex border-b pb-2 mb-4 text-xs text-gray-500">
        <div class="mr-4">Asked <time class="ml-1 text-gray-950">{{ $asked }}</time></div>
        
        @if($modified!=null)
            <div class="mr-4">Modified <time class="ml-1  text-gray-950 ">{{ $modified }}</time></div>
        @endif
        
        <div>Viewed <span class="ml-1 text-gray-950" >{{ $views }}</span></div>
       
    </div>
</header>