<?php

namespace App\Livewire\Dashboard\Admin\Register\Jenjang;

use App\Models\Jenjang;
use Livewire\Component;

class Update extends Component
{
    public Jenjang $item;
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
        
        return redirect()->route('dashboard.admin.register.jenjang')->with('success', 'Successfully updated jenjang');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.jenjang.update', [
            'item' => $this->item
        ]);
    }
}
