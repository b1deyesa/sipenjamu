<?php

namespace App\Livewire\Dashboard\Monev;

use App\Models\MonevRow;
use App\Models\MonevTable;
use App\Models\Periode;
use Livewire\Component;

class Delete extends Component
{
    public Periode $periode;
    public $row;
    public $slug;
    public $programStudi;
    public $table;
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->first();
    }
    
    public function destroy()
    {
        MonevRow::find($this->row)?->delete();
        
        return redirect()->route('dashboard.monev.show', [
            'upps' => $this->programStudi->upps,
            'programStudi' => $this->programStudi,
            'periode' => $this->periode,
            'slug' => $this->slug
        ])->with('success', 'Successfully deleted data ' . $this->table->name);
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.delete', [
            'row' => $this->row,
            'programStudi' => $this->programStudi,
            'periode' => $this->periode,
            'slug' => $this->slug
        ]);
    }
}
