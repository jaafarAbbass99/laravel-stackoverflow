
@php
    $sortingby = [
        'Highest score' =>  'Highest score (default)',
        'Trending'  =>  'Trending (recent votes count more)',
        'Date modified' =>   'Date modified',
        'Date created'=>    'Date created'
    ];
@endphp

<div>
    
    <x-question-header
        :title="$question->title"
        :asked="$question->createdAt "
        :modified="$question->updatedAt"
        :views="$question->viewsCount"
    />

    <div id="body-page" class="w-[70%]"> 
        
        {{-- <x-question-body :question="$question" /> --}}
        

        {{-- <livewire:answers :question="$question" /> --}}

    </div>
</div>