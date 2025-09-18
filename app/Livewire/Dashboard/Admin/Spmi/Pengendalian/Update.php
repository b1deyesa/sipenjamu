<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use App\Models\Pengendalian;
use Livewire\Component;

class Update extends Component
{
    public Pengendalian $item;
    public $name;
    
    public function mount()
    {
        $this->name = $this->item->name;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);
        
        $this->item->update([
            'name' => $this->name
        ]);
        
        return redirect()->route('dashboard.admin.spmi.pengendalian')->with('success', 'Successfully updated pengendalian');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.update', [
            'item' => $this->item
        ]);
    }
}
