<?php

namespace App\Livewire\Dashboard\Spmi\StandarLain;

use App\Models\Upps;
use Livewire\Component;
use App\Models\StandarLain;

class Update extends Component
{
    public Upps $upps;
    public StandarLain $standar_lain;
    public $name;
    public $link;
    
    public function mount()
    {
        $this->name = $this->standar_lain->name;
        $this->link = $this->standar_lain->link;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'link' => 'required'
        ]);
        
        if ($this->link !== $this->standar_lain->link) {
            $this->standar_lain->update([
                'verification_status' => 'pending',
                'document_status' => false
            ]);
        }
        
        $this->standar_lain->update([
            'name' => $this->name,
            'link' => $this->link
        ]);
        
        return redirect()->route('dashboard.spmi.penetapan.standar-lain', ['upps' => $this->upps->id])->with('success', 'Successfully updated standar lain');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.standar-lain.update', [
            'upps' => $this->upps,
            'standar_lain' => $this->standar_lain
        ]);
    }
}
