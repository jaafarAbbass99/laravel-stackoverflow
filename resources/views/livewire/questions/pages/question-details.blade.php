
@php
    $sortingby = [
        'Highest score' =>  'Highest score (default)',
        'Trending'  =>  'Trending (recent votes count more)',
        'Date modified' =>   'Date modified',
        'Date created'=>    'Date created'
    ];
@endphp

<div>
    
    <x-toast-message />


    <x-questions.detailsPage.question-header
        :title="$question->title"
        :asked="$question->createdAt->diffForHumans()"
        :modified="optional($question->updatedAt)?->diffForHumans()"
        :views="$question->viewsCount"
    />

    <div id="body-page" class="w-[70%]"> 
        
        <x-questions.detailsPage.question-body :question="$question" />
        

        {{-- <livewire:answers :question="$question" /> --}}

    </div>
</div>