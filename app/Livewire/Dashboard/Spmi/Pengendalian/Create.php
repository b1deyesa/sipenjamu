<?php

namespace App\Livewire\Dashboard\Spmi\Pengendalian;

use App\Models\Pengendalian;
use App\Models\PengendalianUpps;
use App\Models\Upps;
use Livewire\Component;

class Create extends Component
{
    public Upps $upps;
    public $pengendalians;
    public $show_rtm = false;
    public $show_rtl = false;
    
    public $pengendalian;
    public $link_rtm;
    public $link_rtm_testimony;
    public $link_rtl;
    public $link_rtl_testimony;
    
    public function mount()
    {
        $this->pengendalians = Pengendalian::whereDoesntHave('pengendalianUpps', function($query) {
            $query->where('upps_id', $this->upps->id);
        })->pluck('name', 'id')->toJson();
    }
    
    public function store()
    {
        $this->validate([
            'pengendalian' => 'required'
        ]);
        
        if (!$this->show_rtm) {
            $this->link_rtm = null;
            $this->link_rtm_testimony = null;
        } else {
            $this->validate([
                'link_rtm' => 'required'
            ]);
        }
        
        if (!$this->show_rtl) {
            $this->link_rtl = null;
            $this->link_rtl_testimony = null;
        } else {
            $this->validate([
                'link_rtl' => 'required'
            ]);
        }
        
        PengendalianUpps::create([
            'pengendalian_id' => $this->pengendalian,
            'upps_id' => $this->upps->id,
            'link_rtm' => $this->link_rtm,
            'link_rtm_testimony' => $this->link_rtm_testimony,
            'link_rtl' => $this->link_rtl,
            'link_rtl_testimony' => $this->link_rtl_testimony,
        ]);
        
        return redirect()->route('dashboard.spmi.pengendalian', ['upps' => $this->upps])->with('success', 'Successfully added pengendalian');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.pengendalian.create', [
            'upps' => $this->upps
        ]);
    }
}
