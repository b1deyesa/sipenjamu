<?php

namespace App\Livewire\Dashboard\Spmi\Pengendalian;

use App\Models\Upps;
use Livewire\Component;
use App\Models\PengendalianUpps;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Upps $upps;
    public PengendalianUpps $pengendalianUpps;
    public $password;
    
    public function destroy()
    {
        $this->validate([
            'password' => 'required'
        ]);
        
        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password does not match.',
            ]);
        }
        
        $this->pengendalianUpps->delete();
        
        return redirect()->route('dashboard.spmi.pengendalian', ['upps' => $this->upps])->with('success', 'Successfully deleted pengendalian');
    }
    
    public function render()
    {
        return view('livewire.dashboard.spmi.pengendalian.delete', [
            'upps' => $this->upps,
            'pengendalianUpps' => $this->pengendalianUpps
        ]);
    }
}
