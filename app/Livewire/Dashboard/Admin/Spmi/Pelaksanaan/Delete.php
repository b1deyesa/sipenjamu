<?php

namespace App\Livewire\Dashboard\Admin\Spmi\Pelaksanaan;

use Livewire\Component;
use App\Models\Pelaksanaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Pelaksanaan $item;
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
        
        return redirect()->route('dashboard.admin.spmi.pelaksanaan')->with('success', 'Successfully deleted pelaksanaan');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.pelaksanaan.delete', [
            'item' => $this->item
        ]);
    }
}
