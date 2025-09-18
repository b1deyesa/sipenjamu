<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Peningkatan;

use Livewire\Component;
use App\Models\Peningkatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Peningkatan $item;
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
        
        $this->item->delete();
        
        return redirect()->route('dashboard.admin.spmi.peningkatan')->with('success', 'Successfully deleted peningkatan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.peningkatan.delete', [
            'item' => $this->item
        ]);
    }
}
