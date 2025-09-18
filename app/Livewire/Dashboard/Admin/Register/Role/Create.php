<?php

namespace App\Livewire\Dashboard\Admin\Register\Role;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $display_name;
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'display_name' => 'required',
        ]);
        
        Role::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
        ]);
        
        return redirect()->route('dashboard.admin.register.role')->with('success', 'Successfully added role');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.role.create');
    }
}
