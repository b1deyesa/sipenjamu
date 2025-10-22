<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevRow;
use App\Models\MonevTable;
use App\Models\Periode;

class Update extends Component
{
    public Periode $periode;
    public $row;
    public $programStudi;
    public $slug;
    public $table;
    public $fields;
    public $form = [];
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->firstOrFail();
        $this->fields = $this->table->fields ? json_decode($this->table->fields, true) : [];
        
        $rowData = $this->table->rows->where('id', $this->row)->first();

        foreach ($this->fields as $field) {
            $this->form[$field['name']] = $rowData->data[$field['name']] ?? null;
        }
    }
    
    public function update()
    {
        $rules = [];
        
        foreach ($this->fields as $field) {
            $rules['form.' . $field['name']] = 'required';
        }
        
        $this->validate($rules);

        MonevRow::find($this->row)->update([
            'data' => $this->form,
        ]);
        
        return redirect()->route('dashboard.monev.show', [
            'upps' => $this->programStudi->upps,
            'programStudi' => $this->programStudi,
            'periode' => $this->periode,
            'slug' => $this->slug
        ])->with('success', 'Successfully updated data ' . $this->table->name);
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.update', [
            'row' => $this->row,
            'slug' => $this->slug,
            'programStudi' => $this->programStudi,
            'periode' => $this->periode
        ]);
    }
}
