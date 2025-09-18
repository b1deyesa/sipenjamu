<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use App\Models\Pelaksanaan;
use App\Models\PelaksanaanUpps;
use Livewire\Component;

class Review extends Component
{
    public Pelaksanaan $item;
    public $pelaksanaanUppses;
    
    public function mount()
    {
        $this->pelaksanaanUppses = $this->item->pelaksanaanUpps;
    }
    
    public function updateStatus($id, $value)
    {
        $this->pelaksanaanUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value
        ]);
    }
    
    public function updateDocument($id, $value)
    {
        $this->pelaksanaanUppses->where('upps_id', $id)->first()->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.review', [
            'item' => $this->item
        ]);
    }
}
