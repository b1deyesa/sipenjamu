<?php

namespace App\Livewire\Dashboard\Admin\Register\Jenjang;

use App\Models\Jenjang;
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
        
        Jenjang::create([
            'name' => $this->name,
            'initial' => $this->initial,
            'color' => $this->color ?? '#333333'
        ]);
        
        return redirect()->route('dashboard.admin.register.jenjang')->with('success', 'Successfully added jenjang');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.jenjang.create');
    }
}
