<?php

namespace App\Livewire\Dashboard\Admin\Register\User;

use App\Models\User;
use Livewire\Component;

class Read extends Component
{
    public $users;
    public $search;
    
    public function mount()
    {
        $this->users = User::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.user.read');
    }
}
