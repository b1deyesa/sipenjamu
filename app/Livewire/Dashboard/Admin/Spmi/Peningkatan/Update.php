<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\Peningkatan;

class Update extends Component
{
    public Peningkatan $item;
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
        
        return redirect()->route('dashboard.admin.spmi.peningkatan')->with('success', 'Successfully updated peningkatan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.update', [
            'item' => $this->item
        ]);
    }
}
