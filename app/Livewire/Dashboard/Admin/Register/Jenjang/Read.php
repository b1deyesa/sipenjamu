<?php

namespace App\Livewire\Dashboard\Admin\Register\Jenjang;

use App\Models\Jenjang;
use Livewire\Component;

class Read extends Component
{
    public $jenjangs;
    public $search;
    
    public function mount()
    {
        $this->jenjangs = Jenjang::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.jenjang.read');
    }
}