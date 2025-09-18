<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Evaluasi;

use App\Models\Evaluasi;
use Livewire\Component;

class Read extends Component
{
    public $evaluasis;
    public $search;
    
    public function mount()
    {
        $this->evaluasis = Evaluasi::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.evaluasi.read');
    }
}
