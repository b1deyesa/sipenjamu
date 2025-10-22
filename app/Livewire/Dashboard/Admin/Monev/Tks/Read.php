<?php

namespace App\Livewire\Dashboard\Admin\Monev\Tks;

use App\Models\MonevTable;
use Livewire\Component;

class Read extends Component
{
    public $monevs;
    public $search;
    
    public function mount()
    {
        $this->monevs = MonevTable::where('category', 'tks')->get();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.monev.tks.read');
    }
}
