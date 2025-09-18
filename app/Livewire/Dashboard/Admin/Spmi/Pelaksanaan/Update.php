<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use App\Models\Pelaksanaan;
use Livewire\Component;

class Update extends Component
{
    public Pelaksanaan $item;
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
        
        return redirect()->route('dashboard.admin.spmi.pelaksanaan')->with('success', 'Successfully updated pelaksanaan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.update', [
            'item' => $this->item
        ]);
    }
}
