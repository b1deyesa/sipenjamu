<?php

namespace App\Livewire\Dashboard\Admin\Register\ProgramStudi;

use App\Models\Jenjang;
use App\Models\ProgramStudi;
use App\Models\Upps;
use Livewire\Component;

class Create extends Component
{
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
    }
    
    public function store()
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
        
        ProgramStudi::create([
            'upps_id' => $this->upps['key'],
            'jenjang_id' => $this->jenjang['key'],
            'name' => $this->name,
            'initial' => $this->initial
        ]);
        
        return redirect()->route('dashboard.admin.register.program-studi')->with('success', 'Successfully added program studi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.program-studi.create');
    }
}
