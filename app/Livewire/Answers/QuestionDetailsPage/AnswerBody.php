<?php


namespace App\Livewire\Answers\QuestionDetailsPage;

use App\Modules\Answer\Domain\DTO\AnswerDto;
use Livewire\Component;

class AnswerBody extends Component
{
    // Wireable class  
    public AnswerDto $answer;

    // state
    public bool $questionAnswered;
    public int $canAcceptAnswer;


    // events 
    protected $listeners = ['answerMarkedAsBest' => 'updateState'];

    public function mount(AnswerDto $answer,bool $questionAnswered , int $canAcceptAnswer)
    {
        $this->answer = $answer;
        $this->questionAnswered = $questionAnswered;
        $this->canAcceptAnswer = $canAcceptAnswer;
    }

    public function updateState()
    {
        $this->questionAnswered = true;
    }

    public function render()
    {
        return view('livewire.answer-body');
    }
}
