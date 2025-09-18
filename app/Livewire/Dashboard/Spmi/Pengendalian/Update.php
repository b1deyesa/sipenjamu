<?php

namespace App\Livewire\Dashboard\Spmi\Pengendalian;

use App\Models\Upps;
use Livewire\Component;
use App\Models\Pengendalian;
use App\Models\PengendalianUpps;

class Update extends Component
{
    public Upps $upps;
    public PengendalianUpps $pengendalianUpps;
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
        
        $this->pengendalian = $this->pengendalianUpps->id;
        $this->link_rtm = $this->pengendalianUpps->link_rtm;
        $this->link_rtm_testimony = $this->pengendalianUpps->link_rtm_testimony;
        $this->link_rtl = $this->pengendalianUpps->link_rtl;
        $this->link_rtl_testimony = $this->pengendalianUpps->link_rtl_testimony;
        
        if ($this->link_rtm || $this->link_rtm_testimony) {
            $this->show_rtm = true;
        }
        
        if ($this->link_rtl || $this->link_rtl_testimony) {
            $this->show_rtl = true;
        }
    }
    
    public function update()
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
        
        $this->pengendalianUpps->update([
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
        return view('livewire.dashboard.spmi.pengendalian.update', [
            'upps' => $this->upps,
            'pengendalianUpps' => $this->pengendalianUpps
        ]);
    }
}
