<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $col,
        public string $name,
        public string $label,
        public int $rows = 3,
        public string $placeholder,
        public string|null $value = '',

    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area');
    }
}
