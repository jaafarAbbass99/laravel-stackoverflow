<?php

namespace App\Livewire\Answers\QuestionDetailsPage;

use App\Modules\Answer\Domain\Services\AnswerService;
use App\Modules\Question\Domain\DTO\QuestionDto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Answers extends Component
{
    private QuestionDto $question ;
    private AnswerService $answerService;

    //state
    public int $questionId;
    public int $countAnswers = 0;
    public bool $questionAnswered;
    public bool $canAcceptAnswer;

    protected $listeners = ['answer-added' => 'increaseAnswer'
                            ,'answerMarkedAsBest' => 'setBestAnswer'];

    public function boot(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    public function mount(QuestionDto $question)
    {   
        $this->question = $question;
        $this->questionId = $question->id;
        $this->canAcceptAnswer = Auth::id() === $question->user->id ; 
        $this->questionAnswered = $question->acceptedAnswerId !== null;
        $this->countAnswers = $question->answersCount;
    }


    public function setBestAnswer()
    {
        $this->questionAnswered = true; 
    }

    public function increaseAnswer(){
        $this->countAnswers++;
        
        $this->answerService->increaseAnswerForQuestion(questionId: $this->questionId , NewcountAnswers: $this->countAnswers );
    }


    public function render()
    {
        return view('livewire.answers.questionDetailsPage.answers',[
            'answers'=> $this->answerService
                ->getAnswersWithDetails(questionId: $this->questionId),
        ]);
    }
}
