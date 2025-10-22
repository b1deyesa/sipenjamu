<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Periode, Pengendalian};

class Read extends Component
{
    public Periode $periode;
    public $pengendalians;
    public $search;

    public function mount()
    {
        $this->pengendalians = Pengendalian::whereHas('pengendalianUpps', function ($query) {
            $query->where('periode_id', $this->periode->id);
        })->get();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.read', [
            'periode' => $this->periode,
        ]);
    }
}
