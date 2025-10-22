<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\Periode;
use App\Models\Pelaksanaan;

class Review extends Component
{
    public Periode $periode;
    public Pelaksanaan $item;
    public $pelaksanaanUppses;

    public function mount()
    {
        $this->pelaksanaanUppses = $this->item->pelaksanaanUpps->where('periode_id', $this->periode->id);
    }

    public function updateStatus($id, $value)
    {
        $this->pelaksanaanUppses->where('upps_id', $id)->first()->update([
            'verification_status' => $value,
            'document_status' => $value === 'accepted' ? true : false,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.review', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}