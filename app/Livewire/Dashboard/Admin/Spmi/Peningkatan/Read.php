<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\{Periode, Peningkatan};

class Read extends Component
{
    public Periode $periode;
    public $peningkatans;
    public $search;

    public function mount()
    {
        $this->peningkatans = Peningkatan::whereHas('peningkatanUpps', function ($query) {
            $query->where('periode_id', $this->periode->id);
        })->get();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.read', [
            'periode' => $this->periode,
        ]);
    }
}