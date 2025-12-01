<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerBody extends Component
{

    public $answer;
    public $questionAnswered;

    public function __construct($answer, $questionAnswered)
    {
        $this->answer = $answer;
        $this->questionAnswered = $questionAnswered;
    }
    

    // public function __construct(
    //     public string $description,
    //     public $comments,
    // )
    // {}
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answers.answer-body');
    }
}
