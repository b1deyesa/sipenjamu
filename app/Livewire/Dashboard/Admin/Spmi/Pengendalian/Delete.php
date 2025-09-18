<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pengendalian;

use Livewire\Component;
use App\Models\Pengendalian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Pengendalian $item;
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
        
        return redirect()->route('dashboard.admin.spmi.pengendalian')->with('success', 'Successfully deleted pengendalian');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pengendalian.delete', [
            'item' => $this->item
        ]);
    }
}
