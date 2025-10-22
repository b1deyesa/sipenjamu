<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use App\Models\Periode;
use Livewire\Component;
use App\Models\StandarLain;

class VerificationStatus extends Component
{
    public StandarLain $item;
    public Periode $periode;
    public $standar_lain;

    public function mount()
    {
        $this->standar_lain = $this->item->standarLainUpps;
    }
    
    public function update($value)
    {   
        $this->standar_lain->update([
            'verification_status' => $value
        ]);
        
        if ($value == 'accepted') {
            $this->standar_lain->update([
                'document_status' => true
            ]);
        } else {
            $this->standar_lain->update([
                'document_status' => false
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.verification-status', [
            'item' => $this->item,
            'periode' => $this->periode
        ]);
    }
}
