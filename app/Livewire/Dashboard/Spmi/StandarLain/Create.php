<?php

namespace App\Livewire\Dashboard\Spmi\StandarLain;

use Livewire\Component;
use App\Models\Upps;
use App\Models\Periode;
use App\Models\StandarLain;
use App\Models\StandarLainUpps;

class Create extends Component
{
    public Upps $upps;
    public Periode $periode;
    public $standar_lains;
    public array $name = [];
    public string $description = '';
    public string $link = '';

    public function mount()
    {
        $usedIds = StandarLainUpps::where('periode_id', $this->periode->id)
            ->pluck('standar_lain_id');

        $this->standar_lains = StandarLain::where('upps_id', $this->upps->id)
            ->whereNotIn('id', $usedIds)
            ->pluck('name', 'id');
    }

    public function store()
    {
        $this->validate([
            'name.value' => 'required|string',
            'description' => 'nullable|string',
            'link' => 'required|url',
        ]);

        $standarLain = StandarLain::firstOrCreate([
            'upps_id' => $this->upps->id,
            'name' => $this->name['value'],
        ]);

        StandarLainUpps::updateOrCreate(
            [
                'periode_id' => $this->periode->id,
                'standar_lain_id' => $standarLain->id,
            ],
            [
                'description' => $this->description,
                'link' => $this->link,
            ]
        );

        return redirect()
            ->route('dashboard.spmi.penetapan.standar-lain', [
                'upps' => $this->upps->id,
                'periode' => $this->periode->id,
            ])
            ->with('success', 'Successfully added or updated standar lain for this UPPS and period.');
    }

    public function render()
    {
        return view('livewire.dashboard.spmi.standar-lain.create', [
            'upps' => $this->upps,
            'periode' => $this->periode,
        ]);
    }
}