<?php

namespace App\Livewire\Dashboard\Spmi\EvaluasiLain;

use App\Models\Upps;
use Livewire\Component;
use App\Models\Evaluasi;

class Update extends Component
{
    public Upps $upps;
    public Evaluasi $evaluasi;
    public $name;
    public $date;
    public $link;
    
    public function mount()
    {
        $this->name = $this->evaluasi->name;
        $this->date = $this->evaluasi->date;
        $this->link = $this->evaluasi->link;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'link' => 'required'
        ]);
        
        if ($this->date !== null) {
            $this->evaluasi->update([
                'date' => $this->date
            ]);
        }
        
        if ($this->link !== $this->evaluasi->link) {
            $this->evaluasi->update([
                'verification_status' => 'pending',
                'document_status' => false
            ]);
        }
        
        $this->evaluasi->update([
            'name' => $this->name,
            'link' => $this->link
        ]);
        
        return redirect()->route('dashboard.spmi.evaluasi.evaluasi-lain', ['upps' => $this->upps->id])->with('success', 'Successfully updated evaluasi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.evaluasi-lain.update', [
            'upps' => $this->upps,
            'evaluasi' => $this->evaluasi
        ]);
    }
}
