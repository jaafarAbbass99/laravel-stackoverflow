

@php
    $colors = [
        'Gold' => 'bg-yellow-500',
        'Silver' => 'bg-gray-400',
        'Bronze' => 'bg-amber-700',
    ];
@endphp

<div class="flex items-center gap-3">
    @foreach ($badges as $badge)
       
        @php
            $colorClass = $colors[$badge['type']] ?? 'bg-gray-300';
        @endphp
    
        <span class="text-xs text-gray-600 flex items-center justify-center">
            <span class="rounded-full size-2 mx-1 {{$colorClass}} "></span>
            {{ $badge['count'] }}
        </span>
    @endforeach
</div>
