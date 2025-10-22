<?php

namespace App\Livewire\Dashboard\Spmi;

use Livewire\Component;
use App\Models\{ProfilUpps, Upps, Periode};
use Illuminate\Support\Arr;

class Profil extends Component
{
    public Upps $upps;
    public Periode $periode;
    public $profilUppses;

    public function mount()
    {
        $this->profilUppses = ProfilUpps::where('upps_id', $this->upps->id)
            ->where('periode_id', $this->periode->id)
            ->with('profil')
            ->get();
    }

    public function save($formData)
    {
        $datas = Arr::except($formData, ['_token']);

        foreach ($datas as $id => $value) {
            ProfilUpps::where('id', $id)->update(['value' => $value]);
        }

        return redirect()
            ->route('dashboard.spmi.profil', ['upps' => $this->upps, 'periode' => $this->periode])
            ->with('success', 'Successfully saved profil UPPS.');
    }

    public function render()
    {
        return view('livewire.dashboard.spmi.profil', [
            'upps' => $this->upps,
            'periode' => $this->periode,
            'profilUppses' => $this->profilUppses,
        ]);
    }
}
