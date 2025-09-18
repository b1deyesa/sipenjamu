<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use Livewire\Component;
use App\Models\StandarLain;

class VerificationStatus extends Component
{
    public StandarLain $item;
    
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
        return view('livewire.dashboard.admin.spmi.standar-lain.verification-status', [
            'item' => $this->item
        ]);
    }
}
