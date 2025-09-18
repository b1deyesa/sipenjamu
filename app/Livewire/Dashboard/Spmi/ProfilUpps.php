<?php

namespace App\Livewire\Dashboard\Spmi;

use App\Models\ProfilUpps as ModelsProfilUpps;
use App\Models\Upps;
use Livewire\Component;
use Illuminate\Support\Arr;

class ProfilUpps extends Component
{
    public Upps $upps;
    public $profil_uppses;
    
    public function mount()
    {
        $this->profil_uppses = $this->upps->profilUpps;
    }
    
    public function save($formData)
    {
        $datas = Arr::except($formData, ['_token']);
        
        foreach ($datas as $id => $value) {
            ModelsProfilUpps::where('id', $id)->update([
                'value' => $value
            ]);
        }
        
        return redirect()->route('dashboard.spmi.profil-upps', ['upps' => $this->upps])->with('success', 'Successfuly save profil UPPS');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.profil-upps', [
            'upps' => $this->upps
        ]);
    }
}
