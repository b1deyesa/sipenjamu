<?php

namespace App\View\Components\Navigation;

use Closure;
use App\Models\Periode;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Monev extends Component
{
    public $periodes;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->periodes = Periode::orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.monev');
    }
}
