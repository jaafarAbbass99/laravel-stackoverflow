<?php

namespace App\View\Components\Question\DetailsPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionBody extends Component
{
    public $question;

    public function __construct($question)
    {
        $this->question = $question ;

    }

    public function render(): View|Closure|string
    {
        return view('components.questions.detailsPage.question-body');
    }
}
