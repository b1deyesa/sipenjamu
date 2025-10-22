<?php

namespace App\Livewire\Dashboard\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\{Upps, Periode, PengendalianUpps};
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Upps $upps;
    public Periode $periode;
    public PengendalianUpps $pengendalianUpps;
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

        $this->pengendalianUpps->update([
            'link_rtm' => null,
            'link_rtm_testimony' => null,
            'link_rtl' => null,
            'link_rtl_testimony' => null,
            'verification_status' => 'pending',
            'document_status' => false,
        ]);

        return redirect()
            ->route('dashboard.spmi.pengendalian', [
                'upps' => $this->upps,
                'periode' => $this->periode,
            ])
            ->with('success', 'Successfully cleared pengendalian links');
    }

    public function render()
    {
        return view('livewire.dashboard.spmi.pengendalian.delete', [
            'upps' => $this->upps,
            'periode' => $this->periode,
            'pengendalianUpps' => $this->pengendalianUpps,
        ]);
    }
}
