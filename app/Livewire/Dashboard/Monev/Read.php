<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevRow;
use App\Models\MonevTable;

class Read extends Component
{
    public $upps;
    public $slug;
    public $table;
    public $tables;
    public $searchField;
    public $fields = [];
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->firstOrFail();
        $this->tables = $this->table->rows->where('upps_id', $this->upps->id)->map(fn ($row) => (object) array_merge(['id' => $row->id],$row->data));
        $this->searchField = $this->tables->isNotEmpty() ? array_combine(array_keys(get_object_vars($this->tables->first())), array_keys(get_object_vars($this->tables->first()))) : [];
        $this->fields = $this->table->fields ? json_decode($this->table->fields, true) : [];
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.read', [
            'upps' => $this->upps,
            'slug' => $this->slug
        ]);
    }
}
