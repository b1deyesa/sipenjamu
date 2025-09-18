<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\Peningkatan;

class Review extends Component
{
    public Peningkatan $item;
    public $peningkatanUppses;
    
    public function mount()
    {
        $this->peningkatanUppses = $this->item->peningkatanUpps;
    }
    
    public function updateStatus($id, $value)
    {
        $this->peningkatanUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value
        ]);
    }
    
    public function updateDocument($id, $value)
    {
        $this->peningkatanUppses->where('upps_id', $id)->first()->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.review', [
            'item' => $this->item
        ]);
    }
}
