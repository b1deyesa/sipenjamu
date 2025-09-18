<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $open = false,
        public $id = false,
        public $trigger = false,
        public $label = null,
        public $class = null,
        public $close = false,
        public $title = null,
        public $subtitle = null,
        public $width = '25em',
        public $bottom = false
    )
    {
        $this->open = $open;
        $this->id = $id ? '-'. $id : '';
        $this->trigger = $trigger;
        $this->label = $label;
        $this->class = $class ? ' '. $class : '';
        $this->close = $close;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->width = $width;
        $this->bottom = $bottom;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
