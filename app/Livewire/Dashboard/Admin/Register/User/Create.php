<?php

namespace App\Livewire\Dashboard\Admin\Register\User;

use App\Models\Role;
use App\Models\Upps;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $step = 1;
    public $roles;
    public $uppses;
    
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role = [];
    public $upps = [];
    
    public function mount()
    {
        $this->roles = Role::all()->pluck('display_name', 'id')->toJson();
    }
    
    public function next()
    {
        if ($this->step == 1) {
            $this->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
            ]);
        }
        
        $this->step++;
    }
    
    public function previous()
    {
        $this->step--;
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
    
    public function store()
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
        
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        
        $user->roles()->attach(array_keys($this->role));
        $user->uppses()->attach(array_keys($this->upps));
        
        return redirect()->route('dashboard.admin.register.user')->with('success', 'Successfully added user');
    }

    public function render()
    {
        return view('livewire.dashboard.admin.register.user.create');
    }
}
