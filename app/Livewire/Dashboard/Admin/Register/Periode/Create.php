<?php

namespace App\Livewire\Dashboard\Admin\Register\Periode;

use Livewire\Component;
use App\Models\Periode;

class Create extends Component
{
    public $actives;
    public $name;
    public $start_date;
    public $end_date;
    public $is_active = null;

    public function mount()
    {
        $this->actives = json_encode([
            true => 'Aktif',
            false => 'Tidak Aktif'
        ]);
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($this->is_active) {
            Periode::query()->update(['is_active' => false]);
        }

        Periode::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_active' => $this->is_active == '1' ? true : false
        ]);

        return redirect()->route('dashboard.admin.register.periode')->with('success', 'Successfully added periode');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.register.periode.create');
    }
}