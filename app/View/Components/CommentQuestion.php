<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentQuestion extends Component
{

    public function __construct(
        public $comment,
        public string $author,
        public bool $isAuthor,
        public string $date
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.questions.comments.comment-question');
    }
}
