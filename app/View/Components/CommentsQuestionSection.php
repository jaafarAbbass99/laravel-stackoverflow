<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentsQuestionSection extends Component
{

    public function __construct(public array $comments)
    {}


    public function render(): View|Closure|string
    {
        return view('components.questions.comments.comments-question-section');
    }
}
