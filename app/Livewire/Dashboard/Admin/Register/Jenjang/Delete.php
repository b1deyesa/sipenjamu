<?php

namespace App\Livewire\Dashboard\Admin\Register\Jenjang;

use App\Models\Jenjang;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Jenjang $item;
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
        
        return redirect()->route('dashboard.admin.register.jenjang')->with('success', 'Successfully deleted jenjang');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.jenjang.delete', [
            'item' => $this->item
        ]);
    }
}
