<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentAnswer extends Component
{
    
    public function __construct(
        public string $author ,
        public string $date ,
        public string $body ,
        public bool $isAuthor ,
        public int $votes ,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answers.comments.comment-answer');
    }
}
