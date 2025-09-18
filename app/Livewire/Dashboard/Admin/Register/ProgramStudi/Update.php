<?php

namespace App\Livewire\Dashboard\Admin\Register\ProgramStudi;

use App\Models\Upps;
use App\Models\Jenjang;
use Livewire\Component;
use App\Models\ProgramStudi;

class Update extends Component
{
    public ProgramStudi $item;
    public $uppses;
    public $jenjangs;
    
    public $name;
    public $initial;
    public $upps = ['key' => null, 'value' => null ];
    public $jenjang = ['key' => null, 'value' => null ];
    
    public function mount()
    {
        $this->uppses = Upps::all()->pluck('name', 'id')->toJson();
        $this->jenjangs = Jenjang::all()->pluck('name', 'id')->toJson();
        
        $this->name = $this->item->name;
        $this->initial = $this->item->initial;
        $this->upps = ['key' => $this->item->upps_id, 'value' =>  $this->item->upps->name];
        $this->jenjang = ['key' => $this->item->jenjang_id, 'value' =>  $this->item->jenjang->name];
    }
    
    public function update()
    {
        $this->validate([
            'upps.key' => 'required',
            'jenjang.key' => 'required',
            'name' => 'required',
            'initial' => 'required'
        ], [
            'upps.key.required' => 'UPPS not found.',
            'jenjang.key.required' => 'Jenjang not found.'
        ]);
        
        $this->item->update([
            'upps_id' => $this->upps['key'],
            'jenjang_id' => $this->jenjang['key'],
            'name' => $this->name,
            'initial' => $this->initial
        ]);
        
        return redirect()->route('dashboard.admin.register.program-studi')->with('success', 'Successfully updated program studi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.program-studi.update');
    }
}
