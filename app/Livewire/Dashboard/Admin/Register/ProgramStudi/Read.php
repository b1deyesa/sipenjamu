<?php

namespace App\Livewire\Dashboard\Admin\Register\ProgramStudi;

use App\Models\ProgramStudi;
use Livewire\Component;

class Read extends Component
{
    public $program_studis;
    public $search;
    
    public function mount()
    {
        $this->program_studis = ProgramStudi::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.program-studi.read');
    }
}