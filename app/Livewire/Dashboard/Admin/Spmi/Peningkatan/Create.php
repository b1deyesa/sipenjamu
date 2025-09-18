<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use App\Models\Peningkatan;
use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        Peningkatan::create([
            'name' => $this->name
        ]);
        
        return redirect()->route('dashboard.admin.spmi.peningkatan')->with('success', 'Successfully added peningkatan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.create');
    }
}
