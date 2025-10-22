<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Periode, Pengendalian, PengendalianUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public Pengendalian $item;
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

        PengendalianUpps::where('pengendalian_id', $this->item->id)
            ->where('periode_id', $this->periode->id)
            ->delete();

        return redirect()
            ->route('dashboard.admin.spmi.pengendalian', ['periode' => $this->periode])
            ->with('success', 'Pengendalian berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}