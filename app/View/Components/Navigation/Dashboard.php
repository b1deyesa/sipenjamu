<?php

namespace App\View\Components\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Dashboard extends Component
{
    public $upps_user;
    
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->upps_user = Auth::user()->uppses->first()?->id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.dashboard');
    }
}
