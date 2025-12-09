<?php

namespace App\Livewire\Questions\DetailsPage;


use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\Services\QuestionVoteService;
use Livewire\Component;


class QuestionVote extends Component
{
    private $questionsDto;
    private QuestionVoteService $service ;
    public int $questionId;
    public int $vote_type;
    public int $votesCount;

    public function mount(
        QuestionDto $questionsDto
    ) {
        $this->questionsDto = $questionsDto;
        $this->questionId = $questionsDto->id ;
        $this->vote_type = $questionsDto->myVote?->voteType ?? 0;
        $this->votesCount = $questionsDto->votesCount;
    }
    
    public function boot(QuestionVoteService $service)
    {
        $this->service = $service;
    }


    public function upvote(){

        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        try {
            $this->service->upVote($this->questionId);
    
            $this->vote_type = 1;
    
        } catch (\DomainException $e) {
    
            $this->dispatch(
                'toast-error',
                message: $e->getMessage()
            );
    
            $this->dispatch('revert-upvote');
        }
        
    }

    public function downvote(){

        if (!auth('web')->check()) {
            return redirect();
        }

        try {
            $this->service->downVote($this->questionId);
    
            $this->vote_type = -1;
    
        } catch (\DomainException $e) {
    
            $this->dispatch(
                'toast-error',
                message: $e->getMessage()
            );
    
            $this->dispatch('revert-upvote');
        }
        
    }

    public function render()
    {
        return view('livewire.questions.detailsPage.body.question-vote');
    }
}

