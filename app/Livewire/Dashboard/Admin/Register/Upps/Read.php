<?php

namespace App\Livewire\Dashboard\Admin\Register\Upps;

use App\Models\Upps;
use Livewire\Component;

class Read extends Component
{
    public $uppses;
    public $search;
    
    public function mount()
    {
        $this->uppses = Upps::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.upps.read');
    }
}
