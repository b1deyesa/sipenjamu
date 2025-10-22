<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\Periode;
use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Read extends Component
{
    public Periode $periode;
    public $standar_yang_ditetapkan_institusis;
    public $search;
    
    public function mount()
    {
        $this->standar_yang_ditetapkan_institusis = StandarYangDitetapkanInstitusi::whereHas('standarYangDitetapkanInstitusiUpps', function ($query) { $query->where('periode_id', $this->periode->id); })->get();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.read', [
            'periode' => $this->periode
        ]);
    }
}
