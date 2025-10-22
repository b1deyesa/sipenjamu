<?php

namespace App\Livewire\Dashboard\Admin\Monev\Tks;

use Livewire\Component;
use App\Models\MonevField;
use App\Models\MonevTable;
use Illuminate\Support\Str;

class Create extends Component
{
    public $types;
    public $datas;
    public $name;
    
    public function mount()
    {
        $this->types = json_encode([
            'text' => 'Text',
            'number' => 'Number',
            'textarea' => 'Long Text',
            'select' => 'Select',
            'radio' => 'Choose One',
            'checkbox' => 'Options Check',
        ]);
        
        $this->datas = [
            0 => [
                'name' => null,
                'type' => 'text'
            ]
        ];
    }
    
    public function addData()
    {
        $this->datas[] = [
            'name' => null,
            'type' => 'text'
        ];
    }
    
    public function removeData($key)
    {
        unset($this->datas[$key]);
    }
    
    public function store()
    {
        $this->validate([
            'datas.*.name' => 'required',
            'datas.*.type' => 'required',
        ], [
            'datas.*.name.required' => 'Nama field wajib diisi.',
            'datas.*.type.required' => 'Tipe field wajib diisi.',
        ]);
        
        $table = MonevTable::create([
            'name' => $this->name,
            'category' => 'tks',
            'slug' => Str::slug($this->name)
        ]);
        
        foreach ($this->datas as $data) {
            MonevField::updateOrCreate(
                [
                    'monev_table_id' => $table->id,
                    'name' => $data['name']
                ],
                ['type' => $data['type']]
            );
        }
        
        return redirect()->route('dashboard.admin.monev.tks')->with('success', 'Successfully added Instumen TKS');
    }
    
    public function render()
    {
        return view('livewire.dashboard.admin.monev.tks.create');
    }
}
