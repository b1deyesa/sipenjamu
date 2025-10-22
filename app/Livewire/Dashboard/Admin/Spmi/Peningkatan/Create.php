<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\{Periode, Upps, Peningkatan, PeningkatanUpps};

class Create extends Component
{
    public Periode $periode;
    public array $name = [];
    public $peningkatans;

    public function mount()
    {
        $usedIds = PeningkatanUpps::where('periode_id', $this->periode->id)
            ->pluck('peningkatan_id');

        $this->peningkatans = Peningkatan::whereNotIn('id', $usedIds)
            ->pluck('name', 'id');
    }

    public function store()
    {
        $this->validate([
            'name.value' => 'required|string'
        ]);

        $peningkatan = $this->name['key']
            ? Peningkatan::find($this->name['key'])
            : Peningkatan::create(['name' => $this->name['value']]);

        PeningkatanUpps::insert(
            Upps::all()->map(fn ($upps) => [
                'periode_id' => $this->periode->id,
                'upps_id' => $upps->id,
                'peningkatan_id' => $peningkatan->id,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );

        return redirect()
            ->route('dashboard.admin.spmi.peningkatan', ['periode' => $this->periode])
            ->with('success', 'Successfully added peningkatan');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.create', [
            'periode' => $this->periode,
        ]);
    }
}