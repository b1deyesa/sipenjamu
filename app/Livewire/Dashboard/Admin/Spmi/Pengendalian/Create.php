<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\Pengendalian;

class Create extends Component
{
    public $name;
    
    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        Pengendalian::create([
            'name' => $this->name
        ]);
        
        return redirect()->route('dashboard.admin.spmi.pengendalian')->with('success', 'Successfully added pengendalian');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.create');
    }
}
