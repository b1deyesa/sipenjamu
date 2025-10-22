<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\Periode;
use App\Models\Upps;
use App\Models\Pelaksanaan;
use App\Models\PelaksanaanUpps;

class Create extends Component
{
    public Periode $periode;
    public array $name = [];
    public $pelaksanaans;

    public function mount()
    {
        $usedIds = PelaksanaanUpps::where('periode_id', $this->periode->id)
            ->pluck('pelaksanaan_id');

        $this->pelaksanaans = Pelaksanaan::whereNotIn('id', $usedIds)
            ->pluck('name', 'id');
    }

    public function store()
    {
        $this->validate([
            'name.value' => 'required|string'
        ]);

        $pelaksanaan = $this->name['key']
            ? Pelaksanaan::find($this->name['key'])
            : Pelaksanaan::create(['name' => $this->name['value']]);

        PelaksanaanUpps::insert(
            Upps::all()->map(fn ($upps) => [
                'periode_id' => $this->periode->id,
                'upps_id' => $upps->id,
                'pelaksanaan_id' => $pelaksanaan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );

        return redirect()
            ->route('dashboard.admin.spmi.pelaksanaan', ['periode' => $this->periode])
            ->with('success', 'Successfully added pelaksanaan');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.create', [
            'periode' => $this->periode,
        ]);
    }
}