<?php

namespace App\Livewire\Dashboard\Spmi\EvaluasiLain;

use App\Models\Upps;
use Livewire\Component;
use App\Models\Evaluasi;

class Create extends Component
{
    public Upps $upps;
    public $name;
    public $date;
    public $link;
    
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'date' => 'required',
            'link' => 'required'
        ]);
        
        Evaluasi::create([
            'upps_id' => $this->upps->id,
            'name' => $this->name,
            'date' => $this->date,
            'link' => $this->link
        ]);
        
        return redirect()->route('dashboard.spmi.evaluasi.evaluasi-lain', ['upps' => $this->upps->id])->with('success', 'Successfully added evaluasi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.evaluasi-lain.create', [
            'upps' => $this->upps
        ]);
    }
}
