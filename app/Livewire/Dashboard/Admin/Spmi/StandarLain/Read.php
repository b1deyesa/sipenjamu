<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use App\Models\StandarLain;
use Livewire\Component;

class Read extends Component
{
    public $standar_lains;
    public $search;
    
    public function mount()
    {
        $this->standar_lains = StandarLain::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.read');
    }
}
