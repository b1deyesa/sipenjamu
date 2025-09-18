<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use App\Models\Pengendalian;
use Livewire\Component;

class Review extends Component
{
    public Pengendalian $item;
    public $pengendalianUppses;
    
    public function mount()
    {
        $this->pengendalianUppses = $this->item->pengendalianUpps;
    }
    
    public function updateStatus($id, $value)
    {
        $this->pengendalianUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value
        ]);
        
        if ($value == 'accepted') {
            $this->updateDocument($id, true);
        } else {
            $this->updateDocument($id, false);
        }
    }
    
    public function updateDocument($id, $value)
    {
        $this->pengendalianUppses->where('upps_id', $id)->first()->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.review', [
            'item' => $this->item
        ]);
    }
}
