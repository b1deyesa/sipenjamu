<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevRow;
use App\Models\MonevTable;
use App\Models\Periode;
use Illuminate\Support\Arr;

class Create extends Component
{
    public Periode $periode;
    public $programStudi;
    public $slug;
    public $table;
    public $fields;
    public $form = [];
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->firstOrFail();
        $this->fields = $this->table->fields ? json_decode($this->table->fields, true) : [];
    }
    
    public function store()
    {
        $rules = [];
        
        foreach ($this->fields as $field) {
            $rules['form.' . $field['name']] = 'required';
        }
        
        $this->validate($rules);
        
        MonevRow::create([
            'periode_id'=> $this->periode->id,
            'monev_table_id'=> $this->table->id,
            'program_studi_id' => $this->programStudi->id,
            'data' => $this->form
        ]);
        
        return redirect()->route('dashboard.monev.show', ['upps' => $this->programStudi->upps, 'programStudi' => $this->programStudi, 'slug' => $this->slug, 'periode' => $this->periode]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.create', [
            'programStudi' => $this->programStudi,
            'slug' => $this->slug,
            'periode' => $this->periode,
        ]);
    }
}
