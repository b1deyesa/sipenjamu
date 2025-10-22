<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\{Periode, Pelaksanaan, PelaksanaanUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public Pelaksanaan $item;
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

        PelaksanaanUpps::where('pelaksanaan_id', $this->item->id)
            ->where('periode_id', $this->periode->id)
            ->delete();

        return redirect()
            ->route('dashboard.admin.spmi.pelaksanaan', ['periode' => $this->periode])
            ->with('success', 'Pelaksanaan berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}