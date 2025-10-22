<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarLain;

use Livewire\Component;
use App\Models\{Periode, StandarLain, StandarLainUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public StandarLain $item;
    public $password;

    public function destroy()
    {
        $this->validate([
            'password' => 'required',
        ]);

        if (!Auth::check() || !Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password does not match.',
            ]);
        }

        StandarLainUpps::where('standar_lain_id', $this->item->id)
            ->where('periode_id', $this->periode->id)
            ->delete();

        return redirect()
            ->route('dashboard.admin.spmi.standar-lain', ['periode' => $this->periode->id
])
            ->with('success', 'Standar lain pada periode ini berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-lain.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}