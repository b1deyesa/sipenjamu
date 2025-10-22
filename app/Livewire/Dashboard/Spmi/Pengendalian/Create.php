<?php

namespace App\Livewire\Dashboard\Spmi\Pengendalian;

use App\Models\{Pengendalian, PengendalianUpps, Periode, Upps};
use Livewire\Component;

class Create extends Component
{
    public Upps $upps;
    public Periode $periode;
    public $pengendalians;
    public $show_rtm = false;
    public $show_rtl = false;

    public $pengendalian;
    public $link_rtm;
    public $link_rtm_testimony;
    public $link_rtl;
    public $link_rtl_testimony;

    public function mount()
    {
        $this->pengendalians = Pengendalian::whereDoesntHave('pengendalianUpps', function ($query) {
                $query->where('upps_id', $this->upps->id)
                      ->where('periode_id', $this->periode->id);
            })
            ->orWhereHas('pengendalianUpps', function ($query) {
                $query->where('upps_id', $this->upps->id)
                      ->where('periode_id', $this->periode->id)
                      ->whereNull('link_rtm')
                      ->whereNull('link_rtl')
                      ->whereNull('link_rtm_testimony')
                      ->whereNull('link_rtl_testimony');
            })
            ->pluck('name', 'id')
            ->toJson();
    }

    public function store()
    {
        $this->validate([
            'pengendalian' => 'required',
        ]);

        if (!$this->show_rtm && !$this->show_rtl) {
            $this->addError('show_rtm', 'Minimal salah satu (RTM atau RTL) harus diisi.');
            $this->addError('show_rtl', 'Minimal salah satu (RTM atau RTL) harus diisi.');
            return;
        }

        if ($this->show_rtm) {
            $this->validate([
                'link_rtm' => 'required|url',
            ]);
        } else {
            $this->link_rtm = null;
            $this->link_rtm_testimony = null;
        }

        if ($this->show_rtl) {
            $this->validate([
                'link_rtl' => 'required|url',
            ]);
        } else {
            $this->link_rtl = null;
            $this->link_rtl_testimony = null;
        }

        PengendalianUpps::updateOrCreate(
            [
                'pengendalian_id' => $this->pengendalian,
                'upps_id' => $this->upps->id,
                'periode_id' => $this->periode->id,
            ],
            [
                'link_rtm' => $this->link_rtm,
                'link_rtm_testimony' => $this->link_rtm_testimony,
                'link_rtl' => $this->link_rtl,
                'link_rtl_testimony' => $this->link_rtl_testimony,
                'verification_status' => 'pending',
                'document_status' => false,
            ]
        );

        return redirect()
            ->route('dashboard.spmi.pengendalian', [
                'upps' => $this->upps,
                'periode' => $this->periode,
            ])
            ->with('success', 'Successfully added pengendalian');
    }

    public function render()
    {
        return view('livewire.dashboard.spmi.pengendalian.create', [
            'upps' => $this->upps,
            'periode' => $this->periode,
        ]);
    }
}