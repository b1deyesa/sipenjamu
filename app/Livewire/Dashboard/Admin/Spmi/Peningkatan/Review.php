<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\{Periode, Peningkatan};

class Review extends Component
{
    public Periode $periode;
    public Peningkatan $item;
    public $peningkatanUppses;

    public function mount()
    {
        $this->peningkatanUppses = $this->item->peningkatanUpps->where('periode_id', $this->periode->id);
    }

    public function updateStatus($id, $value)
    {
        $this->peningkatanUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value,
            'document_status' => $value === 'accepted' ? true : false,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.review', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}