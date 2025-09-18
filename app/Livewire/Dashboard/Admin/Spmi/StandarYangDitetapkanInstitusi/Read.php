<?php

namespace App\Livewire\Dashboard\Admin\Spmi\StandarYangDitetapkanInstitusi;

use App\Models\StandarYangDitetapkanInstitusi;
use Livewire\Component;

class Read extends Component
{
    public $standar_yang_ditetapkan_institusis;
    public $search;
    
    public function mount()
    {
        $this->standar_yang_ditetapkan_institusis = StandarYangDitetapkanInstitusi::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.spmi.standar-yang-ditetapkan-institusi.read');
    }
}
