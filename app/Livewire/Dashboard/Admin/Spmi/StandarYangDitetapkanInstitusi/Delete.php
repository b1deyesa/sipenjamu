<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\StandarYangDitetapkanInstitusi;
use Illuminate\Validation\ValidationException;

class Delete extends Component
{
    public StandarYangDitetapkanInstitusi $item;
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
        
        return redirect()->route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi')->with('success', 'Successfully deleted standar yang ditetapkan institusi');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.delete', [
            'item' => $this->item
        ]);
    }
}
