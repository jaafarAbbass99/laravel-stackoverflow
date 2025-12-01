<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $href,
        public string $text,
        public string $variant = 'primary', // primary | outline
        public ?string $icon = null,        // optional icon name (e.g. "log-in")
        public string $iconPosition = 'left' // left | right
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
