<?php

namespace App\Livewire\Dashboard\Admin\Register\ProgramStudi;

use Livewire\Component;
use App\Models\ProgramStudi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public ProgramStudi $item;
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
        
        return redirect()->route('dashboard.admin.register.program-studi')->with('success', 'Successfully deleted program studi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.program-studi.delete', [
            'item' => $this->item
        ]);
    }
}
