<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentsAnswerSection extends Component
{

    public function __construct(public $comments)
    {}


    public function render(): View|Closure|string
    {
        return view('components.answers.comments.comments-answer-section');
    }
}
