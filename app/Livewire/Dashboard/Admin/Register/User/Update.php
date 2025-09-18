<?php

namespace App\Livewire\Dashboard\Admin\Register\User;

use App\Models\Role;
use App\Models\Upps;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Update extends Component
{
    public User $item;
    public $step = 1;
    public $roles;
    public $uppses;
    public $change_password;
    
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role = [];
    public $upps = [];
    
    public function mount()
    {
        $this->roles = Role::all()->pluck('display_name', 'id')->toJson();
        
        $this->name = $this->item->name;
        $this->email = $this->item->email;
        $this->role = $this->item->roles->pluck('id')->mapWithKeys(fn($id) => [$id => true])->toArray();
        $this->upps = $this->item->uppses->pluck('id')->mapWithKeys(fn($id) => [$id => true])->toArray();
        
        if (!empty($this->upps)) {
            $this->uppses = Upps::all()->pluck('name', 'id')->toJson();
        }
    }
    
    public function next()
    {
        if ($this->step == 1) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'. $this->item->id,
            ]);
            if ($this->change_password) {
                $this->validate([
                    'password' => 'required|confirmed'
                ]);
            }
        }
        
        $this->step++;
    }
    
    public function previous()
    {
        $this->step--;
    }
    
    public function changePassword($status)
    {
        $this->change_password = (bool) $status;
        
        if (!$this->change_password) {
            $this->password = null;
            $this->password_confirmation = null;
        }
    }
    
    public function updatedRole($status, $id)
    {
        if ($id == 2 && $status == true) {
            $this->uppses = Upps::all()->pluck('name', 'id')->toJson();
        } elseif ($id == 2 && $status == false) {
            $this->uppses = null;
            $this->upps = [];
        }
    }
    
    public function update()
    {
        $this->role = array_filter($this->role);
        $this->upps = array_filter($this->upps);
        
        $this->validate([
            'role' => 'required|array|min:1'
        ]);
        
        if ($this->uppses) {
            $this->validate([
                'upps' => 'required|array|min:1'
            ]);
        }
        
        $this->item->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
        
        if ($this->change_password) {
            $this->item->update(['password' => Hash::make($this->password)]);
        }
        
        $this->item->roles()->sync(array_keys($this->role));
        $this->item->uppses()->sync(array_keys($this->upps));
        
        return redirect()->route('dashboard.admin.register.user')->with('success', 'Successfully updated user');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.register.user.update', [
            'item' => $this->item
        ]);
    }
}
