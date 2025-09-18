<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $method_name = null;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $class = null,
        public $action = '#',
        public $method = 'GET',
        public $enctype = null,
        public $wire = null,
        public $bottom = null
    )
    {
        $this->class = $class ? ' '. $class : '';
        $this->action = $action;
        $this->enctype = $enctype;
        $this->wire = $wire;
        $this->bottom = $bottom;
        
        if ($method == 'PUT') {
            $this->method = 'POST';
            $this->method_name = 'PUT';
        } elseif ($method == 'DETELE') {
            $this->method = 'POST';
            $this->method_name = 'DELETE';
        } else {
            $this->method = $method;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
