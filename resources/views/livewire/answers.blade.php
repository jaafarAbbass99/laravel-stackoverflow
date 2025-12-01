
@php
    $sortingby = [
        'Highest score' =>  'Highest score (default)',
        'Trending'  =>  'Trending (recent votes count more)',
        'Date modified' =>   'Date modified',
        'Date created'=>    'Date created'
    ];

@endphp
<div>
    <section id="answare" >
                
        <x-answer-header :answers="$countAnswers" :sortingby="$sortingby" />
        
        @foreach ($answers as $answer)
            <livewire:answer-body 
                :answer="$answer" 
                :question-answered="$questionAnswered"
                :question="$question"
                wire:key="answer-{{ $answer->id }}"
            />    
        @endforeach 

    </section>

    <livewire:add-answer :question="$question" />
</div>