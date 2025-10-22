<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\{Periode, Peningkatan, PeningkatanUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public Peningkatan $item;
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

        PeningkatanUpps::where('peningkatan_id', $this->item->id)
            ->where('periode_id', $this->periode->id)
            ->delete();

        return redirect()
            ->route('dashboard.admin.spmi.peningkatan', ['periode' => $this->periode])
            ->with('success', 'Peningkatan berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}