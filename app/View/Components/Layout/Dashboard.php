<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
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
        $this->upps = Auth::user()->uppses->first()?->id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.dashboard');
    }
}
