<?php

namespace App\Livewire\Dashboard\Spmi\Peningkatan;

use App\Models\Upps;
use Livewire\Component;
use App\Models\PeningkatanUpps;

class Update extends Component
{
    public Upps $upps;
    public PeningkatanUpps $peningkatanUpps;
    public $statuses;
    
    public $setting_status;
    public $description;
    public $penetapan_date;
    public $link;
    public $lainnya;
    
    public function mount()
    {
        $statuses = [
            'Belum ada pengaturan' => 'Belum ada pengaturan',
            'Masih dalam proses' => 'Masih dalam proses',
            'Lainnya' => 'Lainnya' 
        ];
        
        $this->statuses = json_encode($statuses);
        $this->link = $this->peningkatanUpps->link;
        $this->description = $this->peningkatanUpps->description;
        $this->setting_status = $this->peningkatanUpps->setting_status;
        
        if ($this->setting_status && $this->setting_status !== 'Ada' && !in_array($this->setting_status, $statuses)) {
            $this->lainnya = $this->setting_status;
            $this->setting_status = 'Lainnya';
        }
    }
    
    public function updateYes()
    {
        $this->validate([
            'penetapan_date' => 'required',
            'link' => 'required'
        ]);
        
        $this->peningkatanUpps->update([
            'setting_status' => 'Ada',
            'penetapan_date' => $this->penetapan_date,
            'link' => $this->link,
            'verification_status' => 'pending',
            'document_status' => false
        ]);
        
        return redirect()->route('dashboard.spmi.peningkatan', ['upps' => $this->upps])->with('success', 'Successfully update peningkatan');
    }
    
    public function updateNo()
    {
        if ($this->setting_status == 'Ada') {
            $this->setting_status = null;
        }
        
        if ($this->setting_status == 'Lainnya') {
            $this->validate([
                'lainnya' => 'required'
            ]);
            $this->setting_status = $this->lainnya;
        }
           
        $this->validate([
            'setting_status' => 'required'
        ]);
        
        $this->peningkatanUpps->update([
            'setting_status' => $this->setting_status,
            'penetapan_date' => null,
            'link' => null,
            'verification_status' => 'pending',
            'document_status' => false
        ]);
        
        return redirect()->route('dashboard.spmi.peningkatan', ['upps' => $this->upps])->with('success', 'Successfully update peningkatan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.peningkatan.update', [
            'upps' => $this->upps,
            'peningkatanUpps' => $this->peningkatanUpps
        ]);
    }
}
