<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Profil;

use Livewire\Component;
use App\Models\{Periode, Upps, Profil, ProfilUpps};

class Create extends Component
{
    public Periode $periode;
    public array $data = [
        'id' => '',
        'name' => '',
        'type' => '',
    ];
    public $profils;
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
        
        $usedIds = ProfilUpps::where('periode_id', $this->periode->id)
            ->pluck('profil_id');

        $this->profils = Profil::whereNotIn('id', $usedIds)
            ->pluck('name', 'id')
            ->toArray();
    }

    public function updatedData()
    {
        if (!isset($this->data['key']) || empty($this->data['key'])) {
            return;
        }

        $profil = Profil::find($this->data['key']);

        if ($profil) {
            $this->data = [
                'id' => $profil->id,
                'name' => $profil->name,
                'type' => $profil->type,
            ];
        }

        unset($this->data['key'], $this->data['value']);
    }

    public function store()
    {
        if ($this->data['id'] == '') {
            $this->data['name'] = $this->data['value'];
            unset($this->data['key'], $this->data['value']);
        }
        
        $this->validate([
            'data.name' => 'required|string',
            'data.type' => 'required|string',
        ]);

        $profil = $this->data['id']
            ? Profil::find($this->data['id'])
            : Profil::create([
                'name' => $this->data['name'],
                'type' => $this->data['type'],
            ]);

        ProfilUpps::insert(
            Upps::all()->map(fn ($upps) => [
                'periode_id' => $this->periode->id,
                'upps_id' => $upps->id,
                'profil_id' => $profil->id,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray()
        );

        return redirect()
            ->route('dashboard.admin.spmi.profil', ['periode' => $this->periode])
            ->with('success', 'Successfully added profil');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.profil.create', [
            'periode' => $this->periode,
        ]);
    }
}