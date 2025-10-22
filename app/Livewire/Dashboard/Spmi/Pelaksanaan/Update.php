<?php

namespace App\Livewire\Dashboard\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\{Upps, Periode, PelaksanaanUpps};

class Update extends Component
{
    public Upps $upps;
    public Periode $periode;
    public PelaksanaanUpps $pelaksanaanUpps;
    public $statuses;

    public $setting_status;
    public $description;
    public $link;
    public $lainnya;

    public function mount()
    {
        $statuses = [
            'Belum ada pengaturan' => 'Belum ada pengaturan',
            'Masih dalam proses' => 'Masih dalam proses',
            'Lainnya' => 'Lainnya',
        ];

        $this->statuses = json_encode($statuses);
        $this->link = $this->pelaksanaanUpps->link;
        $this->description = $this->pelaksanaanUpps->description;
        $this->setting_status = $this->pelaksanaanUpps->setting_status;        
        
        if ($this->setting_status && $this->setting_status !== 'Ada' && !in_array($this->setting_status, $statuses)) {
            $this->lainnya = $this->setting_status;
            $this->setting_status = 'Lainnya';
        }
    }

    public function updateYes()
    {
        $this->validate([
            'link' => 'required|string',
        ]);

        $this->pelaksanaanUpps->update([
            'setting_status' => 'Ada',
            'link' => $this->link,
            'verification_status' => 'pending',
            'document_status' => false,
        ]);

        return redirect()
            ->route('dashboard.spmi.pelaksanaan', ['upps' => $this->upps, 'periode' => $this->periode])
            ->with('success', 'Successfully update pelaksanaan');
    }

    public function updateNo()
    {
        if ($this->setting_status === 'Ada') {
            $this->setting_status = null;
        }

        if ($this->setting_status === 'Lainnya') {
            $this->validate([
                'lainnya' => 'required|string',
            ]);
            $this->setting_status = $this->lainnya;
        }

        $this->validate([
            'setting_status' => 'required|string',
        ]);

        $this->pelaksanaanUpps->update([
            'setting_status' => $this->setting_status,
            'link' => null,
            'verification_status' => 'pending',
            'document_status' => false,
        ]);

        return redirect()
            ->route('dashboard.spmi.pelaksanaan', ['upps' => $this->upps, 'periode' => $this->periode])
            ->with('success', 'Successfully update pelaksanaan');
    }

    public function render()
    {
        return view('livewire.dashboard.spmi.pelaksanaan.update', [
            'upps' => $this->upps,
            'periode' => $this->periode,
            'pelaksanaanUpps' => $this->pelaksanaanUpps,
        ]);
    }
}