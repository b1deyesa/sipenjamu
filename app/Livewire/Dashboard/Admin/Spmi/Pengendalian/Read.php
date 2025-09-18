<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\Pengendalian;

class Read extends Component
{
    public $pengendalians;
    public $search;
    
    public function mount()
    {
        $this->pengendalians = Pengendalian::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.read');
    }
}
