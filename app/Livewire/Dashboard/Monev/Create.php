<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevRow;
use App\Models\MonevTable;
use Illuminate\Support\Arr;

class Create extends Component
{
    public $upps;
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
        // $rules = [];
        
        // foreach ($this->fields as $field) {
        //     $rules['form.' . $field['name']] = 'required';
        // }
        
        // $this->validate($rules);

        MonevRow::create([
            'monev_table_id' => $this->table->id,
            'upps_id'        => $this->upps->id,
            'data'           => $this->form,
        ]);
        
        return redirect()->route('dashboard.monev.show', ['upps' => $this->upps, 'slug' => $this->slug]);
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.create', [
            'upps' => $this->upps,
            'slug' => $this->slug
        ]);
    }
}
