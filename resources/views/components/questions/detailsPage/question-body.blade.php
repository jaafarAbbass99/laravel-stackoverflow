

<section id="body" class=" my-4 grid grid-cols-[auto_auto] grid-rows-[auto_auto]">

    <livewire:questions.details-page.question-vote :questions-dto="$question" />    

    <div id="right">
        <x-description :description="$question->description" />

        {{-- tags --}}
        <x-tag-list :tags="$question->tags" />

        {{-- details --}}
        <div id=details class="flex items-center justify-around mb-5">
            <div class="mr-2" ></div>
            {{-- datetime edited --}}

            @if ($question->updatedAt)
                <x-user-card 
                    :userName="$question->user->name"
                    img="unnamed.jpg"
                    reputation="30"
                    type="edited"
                    date="Aug 2, 2022 at 19:47"
                />
            @endif

            <x-user-card 
                userName="{{$question->user->name}}"
                img="unnamed.jpg"
                reputation="30"
                type="asked"
                date="{{$question->createdAt->format('M d, Y \a\t H:i')}}"
            />

        </div>

    </div>
    <div></div>
    <div>
        <livewire:questions.details-page.comments-section :question="$question" />
    </div>    
</section>