<?php

namespace App\Livewire\Dashboard\Admin\Monev\Buku;

use App\Models\MonevTable;
use Livewire\Component;

class Read extends Component
{
    public $monevs;
    public $search;
    
    public function mount()
    {
        $this->monevs = MonevTable::where('category', 'buku')->get();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.monev.buku.read');
    }
}
