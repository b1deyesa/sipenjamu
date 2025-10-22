<?php

namespace App\Livewire\Dashboard\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\Periode;
use App\Models\Upps;
use Livewire\Component;
use App\Models\StandarYangDitetapkanInstitusiUpps;

class Status extends Component
{
    public Upps $upps;
    public Periode $periode;
    public StandarYangDitetapkanInstitusiUpps $standarYangDitetapkanInstitusiUpps;
    public $statuses;
    
    public $setting_status;
    public $description;
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
        $this->link = $this->standarYangDitetapkanInstitusiUpps->link;
        $this->description = $this->standarYangDitetapkanInstitusiUpps->description;
        $this->setting_status = $this->standarYangDitetapkanInstitusiUpps->setting_status;
        
        if ($this->setting_status && $this->setting_status !== 'Ada' && !in_array($this->setting_status, $statuses)) {
            $this->lainnya = $this->setting_status;
            $this->setting_status = 'Lainnya';
        }
    }
    
    public function updateYes()
    {
        $this->validate([
            'link' => 'required'
        ]);
        
        $this->standarYangDitetapkanInstitusiUpps->update([
            'setting_status' => 'Ada',
            'link' => $this->link,
            'verification_status' => 'pending',
            'document_status' => false
        ]);
        
        return redirect()->route('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', ['upps' => $this->upps, 'periode' => $this->periode])->with('success', 'Successfully update standar yang ditetapkan institusi');
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
        
        $this->standarYangDitetapkanInstitusiUpps->update([
            'setting_status' => $this->setting_status,
            'link' => null,
            'verification_status' => 'pending',
            'document_status' => false
        ]);
        
        return redirect()->route('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', ['upps' => $this->upps, 'periode' => $this->periode])->with('success', 'Successfully update standar yang ditetapkan institusi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.standar-yang-ditetapkan-institusi.status', [
            'upps' => $this->upps,
            'periode' => $this->periode,
            'standarYangDitetapkanInstitusiUpps' => $this->standarYangDitetapkanInstitusiUpps
        ]);
    }
}