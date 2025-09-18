<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Review extends Component
{
    public StandarYangDitetapkanInstitusi $item;
    public $standarYangDitetapkanInstitusiUppses;
    
    public function mount()
    {
        $this->standarYangDitetapkanInstitusiUppses = $this->item->standarYangDitetapkanInstitusiUpps;
    }
    
    public function updateStatus($id, $value)
    {
        $this->standarYangDitetapkanInstitusiUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value
        ]);
    }
    
    public function updateDocument($id, $value)
    {
        $this->standarYangDitetapkanInstitusiUppses->where('upps_id', $id)->first()->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.review', [
            'item' => $this->item
        ]);
    }
}
