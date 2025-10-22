<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use Livewire\Component;
use App\Models\{Periode, StandarYangDitetapkanInstitusi, StandarYangDitetapkanInstitusiUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Periode $periode;
    public StandarYangDitetapkanInstitusi $item;
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

        StandarYangDitetapkanInstitusiUpps::where('standar_yang_ditetapkan_institusi_id', $this->item->id)->where('periode_id', $this->periode->id)->delete();

        return redirect()->route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi', $this->periode)->with('success', 'Standar yang ditetapkan institusi berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.delete', [
            'item' => $this->item,
            'periode' => $this->periode,
        ]);
    }
}
