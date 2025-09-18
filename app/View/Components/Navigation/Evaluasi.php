<?php

namespace App\View\Components\Navigation;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Evaluasi extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $upps
    )
    {
        $this->upps = $upps;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.evaluasi');
    }
}
