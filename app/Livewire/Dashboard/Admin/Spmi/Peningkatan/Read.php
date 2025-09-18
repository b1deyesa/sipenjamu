<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\Peningkatan;

class Read extends Component
{
    public $peningkatans;
    public $search;
    
    public function mount()
    {
        $this->peningkatans = Peningkatan::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.read');
    }
}
