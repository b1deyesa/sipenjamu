<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Profil;

use Livewire\Component;
use App\Models\{Periode, Profil};

class Read extends Component
{
    public Periode $periode;
    public $profils;
    public $search;

    public function mount()
    {
        $this->profils = Profil::whereHas('profilUpps', function ($query) {
            $query->where('periode_id', $this->periode->id);
        })->get();
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.profil.read', [
            'periode' => $this->periode,
        ]);
    }
}