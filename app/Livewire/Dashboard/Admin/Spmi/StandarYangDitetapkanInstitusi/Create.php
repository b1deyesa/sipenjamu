<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Create extends Component
{
    public $name;
    
    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        StandarYangDitetapkanInstitusi::create([
            'name' => $this->name
        ]);
        
        return redirect()->route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi')->with('success', 'Successfully added standar yang ditetapkan institusi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.create');
    }
}
