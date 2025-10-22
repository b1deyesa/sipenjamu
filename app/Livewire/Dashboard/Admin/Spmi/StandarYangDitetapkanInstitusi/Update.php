<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\Periode;
use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Update extends Component
{
    public Periode $periode;
    public StandarYangDitetapkanInstitusi $item;
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
        
        return redirect()->route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi', ['periode' => $this->periode])->with('success', 'Successfully updated standar yang ditetapkan institusi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.update', [
            'item' => $this->item,
            'periode' => $this->periode
        ]);
    }
}
