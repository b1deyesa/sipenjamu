<?php

namespace App\Livewire\Dashboard\Admin\Spmi\EvaluasiLain;

use App\Models\Evaluasi;
use Livewire\Component;

class VerificationStatus extends Component
{
    public Evaluasi $item;
    
    public function update($value)
    {
        $this->item->update([
            'verification_status' => $value
        ]);
        
        if ($value == 'accepted') {
            $this->item->update([
                'document_status' => true
            ]);
        } else {
            $this->item->update([
                'document_status' => false
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.evaluasi-lain.verification-status', [
            'item' => $this->item
        ]);
    }
}