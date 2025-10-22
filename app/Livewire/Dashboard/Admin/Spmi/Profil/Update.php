<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Profil;

use Livewire\Component;
use App\Models\{Periode, Upps, Profil, ProfilUpps};

class Update extends Component
{
    public Periode $periode;
    public Profil $item;
    public array $data = [
        'id' => '',
        'name' => '',
        'type' => '',
    ];
    public $types;

    public function mount()
    {
        $this->types = [
            'text' => 'Text',
            'number' => 'Number',
            'textarea' => 'Long Text',
            'select' => 'Select',
            'radio' => 'Choose One',
            'checkbox' => 'Options Check',
        ];

        $this->data = [
            'id' => $this->item->id,
            'name' => $this->item->name,
            'type' => $this->item->type,
        ];
    }

    public function update()
    {
        $this->validate([
            'data.name' => 'required|string',
            'data.type' => 'required|string',
        ]);

        // Update profil untuk semua periode (jika ada dengan nama sama)
        Profil::where('name', $this->item->name)->update([
            'name' => $this->data['name'],
            'type' => $this->data['type'],
        ]);

        // Pastikan ProfilUpps tetap ada untuk periode aktif
        if (!ProfilUpps::where('periode_id', $this->periode->id)
            ->where('profil_id', $this->item->id)
            ->exists()) {
            ProfilUpps::insert(
                Upps::all()->map(fn ($upps) => [
                    'periode_id' => $this->periode->id,
                    'upps_id' => $upps->id,
                    'profil_id' => $this->item->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])->toArray()
            );
        }

        return redirect()
            ->route('dashboard.admin.spmi.profil', ['periode' => $this->periode])
            ->with('success', 'Successfully updated profil');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.profil.update', [
            'periode' => $this->periode,
            'item' => $this->item,
            'types' => $this->types,
        ]);
    }
}