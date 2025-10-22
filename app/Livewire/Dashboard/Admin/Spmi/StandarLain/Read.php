<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use App\Models\Periode;
use Livewire\Component;
use App\Models\StandarLain;

class Read extends Component
{
    public Periode $periode;
    public $standar_lains;
    public $search;
    
    public function mount()
    {
        $this->standar_lains = StandarLain::query()
            ->whereHas('standarLainUpps', fn($q) => $q->where('periode_id', $this->periode->id))
            ->with(['standarLainUpps' => fn($q) => $q->where('periode_id', $this->periode->id)])
            ->get();

        $this->standar_lains->each(function ($standar) {
            $standar->setRelation('standarLainUpps', $standar->standarLainUpps->first());
        });
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.read', [
            'periode' => $this->periode
        ]);
    }
}