<?php

namespace App\Livewire\Dashboard\Admin\Register\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public User $item;
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
        
        return redirect()->route('dashboard.admin.register.user')->with('success', 'Successfully deleted user');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.user.delete', [
            'item' => $this->item
        ]);
    }
}
