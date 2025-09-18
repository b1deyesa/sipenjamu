<?php

namespace App\Livewire\Dashboard\Admin\Register\Role;

use App\Models\Role;
use Livewire\Component;

class Update extends Component
{
    public Role $item;
    public $name;
    public $display_name;
    
    public function mount()
    {
        $this->name = $this->item->name;
        $this->display_name = $this->item->display_name;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'. $this->item->id,
            'display_name' => 'required',
        ]);
        
        $this->item->update([
            'name' => $this->name,
            'display_name' => $this->display_name,
        ]);
        
        return redirect()->route('dashboard.admin.register.role')->with('success', 'Successfully updated role');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.role.update', [
            'item' => $this->item
        ]);
    }
}
