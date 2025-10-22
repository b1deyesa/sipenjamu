<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\{Periode, Pelaksanaan};

class Update extends Component
{
    public Periode $periode;
    public Pelaksanaan $item;
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

        $this->item->update([
            'name' => $this->name,
        ]);

        return redirect()
            ->route('dashboard.admin.spmi.pelaksanaan', ['periode' => $this->periode])
            ->with('success', 'Successfully updated pelaksanaan');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.update', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}