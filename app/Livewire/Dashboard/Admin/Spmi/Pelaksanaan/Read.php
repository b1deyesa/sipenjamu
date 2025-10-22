<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use App\Models\Pelaksanaan;
use App\Models\Periode;
use Livewire\Component;

class Read extends Component
{
    public Periode $periode;
    public $pelaksanaans;
    public $search;
    
    public function mount()
    {
        $this->pelaksanaans = Pelaksanaan::whereHas('pelaksanaanUpps', function ($query) {
            $query->where('periode_id', $this->periode->id);
        })->get();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.read', [
            'periode' => $this->periode
        ]);
    }
}