<?php

namespace App\Livewire\Dashboard\Admin\Register\Role;

use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Role $item;
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
        
        return redirect()->route('dashboard.admin.register.role')->with('success', 'Successfully deleted role');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.role.delete', [
            'item' => $this->item
        ]);
    }
}
