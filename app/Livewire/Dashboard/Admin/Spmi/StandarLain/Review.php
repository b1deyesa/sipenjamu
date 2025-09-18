<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use Livewire\Component;
use App\Models\StandarLain;

class Review extends Component
{
    public StandarLain $item;
    public $standarLainUpps;
    
    public function mount()
    {
        $this->standarLainUpps = $this->item->standarLainUpps?->first();
    }
    
    public function updateStatus($id, $value)
    {
        $this->standarLainUpps->update([
            'verification_status' => $value
        ]);
    }
    
    public function updateDocument($id, $value)
    {
        $this->standarLainUpps->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.review', [
            'item' => $this->item
        ]);
    }
}
