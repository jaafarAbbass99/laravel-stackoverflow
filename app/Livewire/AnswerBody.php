<?php

namespace App\Livewire;

use Livewire\Component;

class AnswerBody extends Component
{
    public $answer;
    public $question;

    public $questionAnswered;


    protected $listeners = ['answerMarkedAsBest' => 'updateState'];

    public function mount($answer, $questionAnswered , $question)
    {
        $this->answer = $answer;
        $this->questionAnswered = $questionAnswered;
        $this->question = $question;
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
