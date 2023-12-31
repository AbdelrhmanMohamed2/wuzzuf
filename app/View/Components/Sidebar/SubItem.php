<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $route,
        public string $icon,
        public string $param = '',
        public bool $padding = true,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar.sub-item');
    }
}
