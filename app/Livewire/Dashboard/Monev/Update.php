<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevRow;
use App\Models\MonevTable;

class Update extends Component
{
    public $upps;
    public $slug;
    public $table;
    public $tables;
    public $searchField;
    public $fields = [];
    public $rows = [];
    public $form = [];

    public function mount($slug, $upps)
    {
        $this->slug = $slug;
        $this->upps = $upps;

        $this->table = MonevTable::where('slug', $slug)->firstOrFail();
        $this->tables = MonevTable::where('slug', $slug)->firstOrFail()->rows->where('upps_id', $this->upps->id)->map(fn ($row) => collect($row->data));
        $this->searchField = $this->tables->isNotEmpty() ? array_combine(array_keys($this->tables->first()->toArray()), array_keys($this->tables->first()->toArray())) : [];

        $this->fields = $this->table->fields ? json_decode($this->table->fields, true) : [];
        $this->rows = MonevRow::where('monev_table_id', $this->table->id)->where('upps_id', $this->upps->id)->get();
    }

    public function save()
    {
        $rules = [];
        
        foreach ($this->fields as $field) {
            $rules['form.' . $field['name']] = 'required';
        }
        
        $this->validate($rules);

        MonevRow::create([
            'monev_table_id' => $this->table->id,
            'upps_id'        => $this->upps->id,
            'data'           => $this->form,
        ]);

        $this->form = [];
        $this->rows = MonevRow::where('monev_table_id', $this->table->id)->where('upps_id', $this->upps->id)->get();
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.update');
    }
}