<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class SelectBox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $col = "4",
        public string $name,
        public string $label,
        // public string $default,
        public string $oldvalue = 'default',
        // public array|Collection $options = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-box');
    }
}
