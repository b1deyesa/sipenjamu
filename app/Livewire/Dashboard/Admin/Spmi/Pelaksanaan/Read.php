<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use App\Models\Pelaksanaan;
use Livewire\Component;

class Read extends Component
{
    public $pelaksanaans;
    public $search;
    
    public function mount()
    {
        $this->pelaksanaans = Pelaksanaan::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.read');
    }
}
