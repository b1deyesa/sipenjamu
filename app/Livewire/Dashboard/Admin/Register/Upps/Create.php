<?php

namespace App\Livewire\Dashboard\Admin\Register\Upps;

use App\Models\Upps;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $initial;
    public $color;
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'initial' => 'required'
        ]);
        
        Upps::create([
            'name' => $this->name,
            'initial' => $this->initial,
            'color' => $this->color ?? '#333333'
        ]);
        
        return redirect()->route('dashboard.admin.register.upps')->with('success', 'Successfully added UPPS');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.upps.create');
    }
}
