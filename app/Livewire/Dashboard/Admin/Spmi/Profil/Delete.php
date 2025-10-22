<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Profil;

use Livewire\Component;
use App\Models\{Periode, Profil, ProfilUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public Profil $item;
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

        ProfilUpps::where('profil_id', $this->item->id)
            ->where('periode_id', $this->periode->id)
            ->delete();

        return redirect()
            ->route('dashboard.admin.spmi.profil', ['periode' => $this->periode])
            ->with('success', 'Profil berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.profil.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}