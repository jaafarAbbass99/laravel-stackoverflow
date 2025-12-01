<?php

namespace App\View\Components\Question\DetailsPage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionHeader extends Component
{

    public function __construct(
        public string $title,
        public string $asked,
        public string $modified,
        public int $views,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.questions.detailsPage.question-header');
    }
}
