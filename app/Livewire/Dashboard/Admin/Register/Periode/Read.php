<?php

namespace App\Livewire\Dashboard\Admin\Register\Periode;

use Livewire\Component;
use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Read extends Component
{
    public Collection $periodes;
    public $search;

    public function mount()
    {
        Carbon::setLocale('id');

        $this->periodes = Periode::all()
            // ->map(function ($periode) {
            //     $periode->start_date = Carbon::parse($periode->start_date)->translatedFormat('j F Y');
            //     $periode->end_date = Carbon::parse($periode->end_date)->translatedFormat('j F Y');
            //     return $periode;
            // })
        ;
    }

    public function render()
    {
        return view('livewire.dashboard.admin.register.periode.read', [
            'periodes' => $this->periodes,
        ]);
    }
}