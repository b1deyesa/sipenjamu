<?php

namespace App\View\Components\Navigation;

use Closure;
use App\Models\Periode;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $upps = null;
    public $periode = null;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->upps = request()->route('upps') ?: Auth::user()->uppses?->first();
        $this->periode = request()->route('periode') ?: Periode::orderBy('id', 'desc')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.dashboard');
    }
}
