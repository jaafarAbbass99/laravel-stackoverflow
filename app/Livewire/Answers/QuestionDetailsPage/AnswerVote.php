<?php

namespace App\Livewire\Answers\QuestionDetailsPage;


use App\Modules\Answer\Domain\DTO\AnswerDto;
use App\Modules\Answer\Domain\Rules\CanAcceptAnswer;
use App\Modules\Answer\Domain\Services\AnswerVoteService;
use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\Services\QuestionVoteService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AnswerVote extends Component
{ 
    
    private AnswerVoteService $service ;
    private AnswerDto $answerDto;

    //state
    public int $questionId;
    public int $answerId;
    
    public $vote ;
    public int $vote_type;
    public int $votesCount;

    public bool $accepted = false; 
    public bool $canAcceptAnswer;
    public bool $questionAnswered;

    protected $listeners = ['answerMarkedAsBest' => 'refreshCheck'];
    
    public function boot(AnswerVoteService $service)
    {
        $this->service = $service;
    }

    public function mount(
        AnswerDto $answerDto , 
        bool $questionAnswered,
        bool $canAcceptAnswer,
    ) {
        $this->questionId = $answerDto->questionId;
        $this->canAcceptAnswer = $canAcceptAnswer;

        $this->answerDto = $answerDto;
        $this->answerId = $answerDto->id;

        $this->vote_type = $answerDto->myVote?->voteType ?? 0;
        $this->votesCount = $answerDto->votesCount;

        $this->accepted = $answerDto->isAccepted == 1 ? true :false ;
        $this->questionAnswered = $questionAnswered;

    }

    public function upvote(){

        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        try {
            $this->service->upVote($this->questionId, $this->answerId);
    
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
            return redirect()->route('login');
        }

        try {
            $this->service->downVote($this->questionId , $this->answerId);
    
            $this->vote_type = -1;
    
        } catch (\DomainException $e) {
    
            $this->dispatch(
                'toast-error',
                message: $e->getMessage()
            );
    
            $this->dispatch('revert-downvote');
        }
        
    }


    public function makeAccepted(){

        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        try {

            CanAcceptAnswer::check(
                questionAnswered: $this->questionAnswered,
                canAcceptAnswer: $this->canAcceptAnswer
            );

            $this->service->acceptAnswer($this->questionId , $this->answerId);
            
            $this->accepted = true;

            $this->dispatch('answerMarkedAsBest');
    
        } catch (\DomainException $e) {
            $this->dispatch('toast-error', message: $e->getMessage());
        }

    }


    public function refreshCheck()
    {
        $this->questionAnswered = true;
    }

    public function render()
    {
        return view('livewire.answer-vote');
    }
}

