<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Periode, Pengendalian};

class Review extends Component
{
    public Periode $periode;
    public Pengendalian $item;
    public $pengendalianUppses;

    public function mount()
    {
        $this->pengendalianUppses = $this->item->pengendalianUpps()
            ->where('periode_id', $this->periode->id)
            ->get();
    }

    public function updateStatus($id, $value)
    {
        $pengendalianUpps = $this->pengendalianUppses
            ->where('upps_id', $id)
            ->first();

        if (!$pengendalianUpps) return;

        $pengendalianUpps->update([
            'verification_status' => $value,
            'document_status' => $value === 'accepted',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.review', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}
