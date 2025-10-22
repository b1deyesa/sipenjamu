<?php

namespace App\View\Components\Navigation;

use App\Models\Periode;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Admin extends Component
{
    public $periode;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->periode = request()->route('periode') ?: Periode::orderBy('id', 'desc')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.admin');
    }
}
