<?php

namespace App\Livewire\Dashboard\Spmi\StandarLain;

use App\Models\Upps;
use Livewire\Component;
use App\Models\StandarLain;

class Create extends Component
{
    public Upps $upps;
    public $name;
    public $link;
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'link' => 'required'
        ]);
        
        StandarLain::create([
            'upps_id' => $this->upps->id,
            'name' => $this->name,
            'link' => $this->link
        ]);
        
        return redirect()->route('dashboard.spmi.penetapan.standar-lain', ['upps' => $this->upps->id])->with('success', 'Successfully added standar lain');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.standar-lain.create', [
            'upps' => $this->upps
        ]);
    }
}
