@props(['userName','img','reputation','date','type'])

@php
    $askedClass = 'bg-sky-100 w-50 p-2 rounded-sm' ; 
@endphp


<div class="mr-2 {{$type==='asked' ? $askedClass:''}}" >
    @if ($type!='edited')
        <p class="text-xs text-gray-500 mb-1">{{$type}} {{$date}}</p>
    @else
        <a href="" class="text-xs text-sky-600 mb-1">
            edited <time>{{$date}}</time>
        </a>
    @endif
    
    <div id="user" class="flex">
        <a href="">
            <img src="{{asset($img)}}" alt="img_user" class="size-8 rounded-sm mr-2">
        </a>
        <div class="flex flex-col items-start justify-start ">
            <a href="" class="text-xs font-medium text-sky-600" >{{$userName}}</a>
            <div class="flex ">
                <span class="text-xs mr-1 font-extrabold text-gray-500">{{$reputation}}</span>
                
                {{-- badges --}}
                <x-badges :badges="[
                    ['type' => 'Gold', 'count' => 120],
                    ['type' => 'Silver', 'count' => 80],
                    ['type' => 'Bronze', 'count' => 50],]"
                />
                
                
            </div>
        </div>
    </div>
</div>


