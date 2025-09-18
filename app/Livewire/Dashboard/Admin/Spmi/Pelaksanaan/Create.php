<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use App\Models\Pelaksanaan;
use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        Pelaksanaan::create([
            'name' => $this->name
        ]);
        
        return redirect()->route('dashboard.admin.spmi.pelaksanaan')->with('success', 'Successfully added pelaksanaan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.create');
    }
}
