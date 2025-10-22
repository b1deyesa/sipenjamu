<?php

namespace App\View\Components\Layout;

use Closure;
use App\Models\Periode;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Spmi extends Component
{
    public $periodes;
    
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
        $this->periodes = Periode::orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.spmi');
    }
}
