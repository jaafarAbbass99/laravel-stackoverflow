<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VotePanel extends Component
{
    public function __construct(
        public int $votes = 0 , 
        public bool $showCheck=false , 
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.vote-panel');
    }
}
