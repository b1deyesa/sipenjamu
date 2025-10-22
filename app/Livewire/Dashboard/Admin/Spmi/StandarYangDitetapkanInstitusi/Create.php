<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\Periode;
use Livewire\Component;
use App\Models\StandarYangDitetapkanInstitusi;
use App\Models\StandarYangDitetapkanInstitusiUpps;
use App\Models\Upps;

class Create extends Component
{
    public Periode $periode;
    public array $name = [];
    public $standar_yang_ditetapkan_institusis;

    public function mount()
    {
        $usedIds = StandarYangDitetapkanInstitusiUpps::where('periode_id', $this->periode->id)
            ->pluck('standar_yang_ditetapkan_institusi_id');

        $this->standar_yang_ditetapkan_institusis = StandarYangDitetapkanInstitusi::whereNotIn('id', $usedIds)
            ->pluck('name', 'id');
    }

    public function store()
    {
        $this->validate([
            'name.value' => 'required|string'
        ]);

        $standar = $this->name['key']
            ? StandarYangDitetapkanInstitusi::find($this->name['key'])
            : StandarYangDitetapkanInstitusi::create(['name' => $this->name['value']]);

        StandarYangDitetapkanInstitusiUpps::insert(
            Upps::all()->map(fn ($upps) => [
                'periode_id' => $this->periode->id,
                'upps_id' => $upps->id,
                'standar_yang_ditetapkan_institusi_id' => $standar->id,
                'created_at' => now(),
                'updated_at' => now()
            ])->toArray()
        );
        
        return redirect()->route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi', ['periode' => $this->periode])->with('success', 'Successfully added standar yang ditetapkan institusi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.create', [
            'periode' => $this->periode
        ]);
    }
}
