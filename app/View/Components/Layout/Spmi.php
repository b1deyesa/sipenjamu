<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Spmi extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class = null,
        public $upps = null
    )
    {
        $this->class = $class ? ' '. $class : '';
        $this->upps = $upps;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.spmi');
    }
}
