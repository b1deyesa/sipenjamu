<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Periode, Pengendalian};

class Update extends Component
{
    public Periode $periode;
    public Pengendalian $item;
    public $name;

    public function mount()
    {
        $this->name = $this->item->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string',
        ]);

        Pengendalian::where('name', $this->item->name)->update([
            'name' => $this->name,
        ]);

        return redirect()
            ->route('dashboard.admin.spmi.pengendalian', ['periode' => $this->periode])
            ->with('success', 'Successfully updated pengendalian for all periodes');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.update', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}