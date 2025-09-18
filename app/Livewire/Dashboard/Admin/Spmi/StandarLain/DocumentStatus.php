<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use Livewire\Component;
use App\Models\StandarLain;

class DocumentStatus extends Component
{
    public StandarLain $item;

    public function update($value)
    {
        $this->item->update([
            'document_status' => $value
        ]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.document-status', [
            'item' => $this->item
        ]);
    }
}
