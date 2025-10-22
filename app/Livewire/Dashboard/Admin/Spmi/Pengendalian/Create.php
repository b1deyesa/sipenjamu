<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Periode, Upps, Pengendalian, PengendalianUpps};

class Create extends Component
{
    public Periode $periode;
    public array $name = [];
    public $pengendalians;

    public function mount()
    {
        $usedIds = PengendalianUpps::where('periode_id', $this->periode->id)
            ->pluck('pengendalian_id');

        $this->pengendalians = Pengendalian::whereNotIn('id', $usedIds)
            ->pluck('name', 'id');
    }

    public function store()
    {
        $this->validate([
            'name.value' => 'required|string'
        ]);

        $pengendalian = $this->name['key']
            ? Pengendalian::find($this->name['key'])
            : Pengendalian::create(['name' => $this->name['value']]);

        PengendalianUpps::insert(
            Upps::all()->map(fn ($upps) => [
                'periode_id' => $this->periode->id,
                'upps_id' => $upps->id,
                'pengendalian_id' => $pengendalian->id,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );

        return redirect()
            ->route('dashboard.admin.spmi.pengendalian', ['periode' => $this->periode])
            ->with('success', 'Successfully added pengendalian');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.create', [
            'periode' => $this->periode,
        ]);
    }
}