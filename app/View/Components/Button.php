<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $type = 'button',
        public $href = '#',
        public $id = null,
        public $class = null,
        public $wire = null
    )
    {
        $this->type = $type;
        $this->href = $href;
        $this->id = $id;
        $this->class = $class ? ' '. $class : '';
        $this->wire = $wire;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
