<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\{Periode, Peningkatan};

class Update extends Component
{
    public Periode $periode;
    public Peningkatan $item;
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
            ->route('dashboard.admin.spmi.peningkatan', ['periode' => $this->periode])
            ->with('success', 'Successfully updated peningkatan');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.update', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}