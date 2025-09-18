<?php

namespace App\Livewire\Dashboard\Admin\Register\Upps;

use App\Models\Upps;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public Upps $item;
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
        
        return redirect()->route('dashboard.admin.register.upps')->with('success', 'Successfully deleted UPPS');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.upps.delete', [
            'item' => $this->item
        ]);
    }
}
