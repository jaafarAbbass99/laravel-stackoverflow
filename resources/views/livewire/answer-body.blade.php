



<section id="body" class="border-b text-sm border-gray-300 mt-4 grid grid-cols-[auto_auto] grid-rows-[auto_auto]">

    <livewire:answers.question-details-page.answer-vote :answer-dto="$answer" :question-answered="$questionAnswered" :can-accept-answer="$canAcceptAnswer" />
    
    <div id="right">

        <x-description :description="$answer->description" />
        
        {{-- details --}}
        <div id=details class="flex items-center justify-around mb-5">
            <div class="mr-2" ></div>
            {{-- datetime edited --}}

            <x-user-card 
                :user-name="$answer->author->name"
                img="unnamed.jpg"
                reputation="30"
                type="answered"
                date="{{ $answer->createdAt->format('M j, Y \a\t H:i') }}"
            />

        </div>

    </div>
    
    <div class="mr-2"></div>
                
    {{-- comments --}}                
    <x-comments-answer-section :comments="$answer->comments"/>
    
</section>