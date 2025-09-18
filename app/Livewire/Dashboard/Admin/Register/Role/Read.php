<?php

namespace App\Livewire\Dashboard\Admin\Register\Role;

use App\Models\Role;
use Livewire\Component;

class Read extends Component
{
    public $roles;
    public $search;
    
    public function mount()
    {
        $this->roles = Role::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.role.read');
    }
}