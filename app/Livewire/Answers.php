<?php

namespace App\Livewire;

use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Answers extends Component
{
    public Question $question ;

    public int $countAnswers = 0;
    public bool $questionAnswered;
    public $answers;

    protected $listeners = ['answer-added' => 'increaseAnswer'
                            ,'answerMarkedAsBest' => 'setBestAnswer'];

    public function mount(Question $question)
    {   
        $this->question = $question;
        $this->questionAnswered = $question->accepted_answer_id !== null  ;
        $this->countAnswers = $question->answers_count;
        $this->answers = $this->question->answers()->with([
            'comments.user',
            'user',
            'votes'=> fn($q) => $q->where('voted_by', Auth::id()),
            ])->get();
    }

    public function setBestAnswer()
    {
        $this->questionAnswered = true; 
    }

    public function increaseAnswer(){
        $this->question->answers_count++;
        $this->question->save();

        $this->countAnswers++;
        $this->showAnswers();
    }

    public function render()
    {
        return view('livewire.answers');
    }
}
