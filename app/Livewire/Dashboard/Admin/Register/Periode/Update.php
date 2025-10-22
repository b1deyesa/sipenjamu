<?php

namespace App\Livewire\Dashboard\Admin\Register\Periode;

use Livewire\Component;
use App\Models\Periode;

class Update extends Component
{
    public Periode $item;
    public $actives;
    public $name;
    public $start_date;
    public $end_date;
    public $is_active;

    public function mount()
    {
        $this->actives = json_encode([
            true => 'Aktif',
            false => 'Tidak Aktif'
        ]);

        $this->name = $this->item->name;
        $this->start_date = $this->item->start_date;
        $this->end_date = $this->item->end_date;
        $this->is_active = $this->item->is_active ? '1' : '0';
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($this->is_active == '1') {
            Periode::query()->update(['is_active' => false]);
        }

        $this->item->update([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_active' => $this->is_active == '1' ? true : false,
        ]);

        return redirect()->route('dashboard.admin.register.periode')->with('success', 'Successfully updated periode');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.register.periode.update', [
            'item' => $this->item,
        ]);
    }
}