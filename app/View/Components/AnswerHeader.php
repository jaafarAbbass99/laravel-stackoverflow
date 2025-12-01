<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerHeader extends Component
{

    public function __construct(
       public int $answers ,
       public array $sortingby 
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answers.answer-header');
    }
}
