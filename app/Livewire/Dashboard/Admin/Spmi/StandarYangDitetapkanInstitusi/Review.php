<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\Periode;
use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Review extends Component
{
    public Periode $periode;
    public StandarYangDitetapkanInstitusi $item;
    public $standarYangDitetapkanInstitusiUppses;
    
    public function mount()
    {
        $this->standarYangDitetapkanInstitusiUppses = $this->item->standarYangDitetapkanInstitusiUpps->where('periode_id', $this->periode->id);
    }
    
    public function updateStatus($id, $value)
    {
        $this->standarYangDitetapkanInstitusiUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value,
            'document_status' => $value == 'accepted' ? true : false
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.review', [
            'item' => $this->item,
            'periode' => $this->periode
        ]);
    }
}
