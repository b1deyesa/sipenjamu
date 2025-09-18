<?php

namespace App\Livewire\Dashboard\Admin\Register\Upps;

use App\Models\Upps;
use Livewire\Component;

class Update extends Component
{
    public Upps $item;
    public $name;
    public $initial;
    public $color;
    
    public function mount()
    {
        $this->name = $this->item->name;
        $this->initial = $this->item->initial;
        $this->color = $this->item->color;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'initial' => 'required'
        ]);
        
        $this->item->update([
            'name' => $this->name,
            'initial' => $this->initial,
            'color' => $this->color == null ? '#333333' : $this->color
        ]);
        
        return redirect()->route('dashboard.admin.register.upps')->with('success', 'Successfully updated UPPS');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.upps.update', [
            'item' => $this->item
        ]);
    }
}