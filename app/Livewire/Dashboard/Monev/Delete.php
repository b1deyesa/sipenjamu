<?php

namespace App\Livewire\Dashboard\Monev;

use App\Models\MonevRow;
use App\Models\MonevTable;
use Livewire\Component;

class Delete extends Component
{
    public $row;
    public $slug;
    public $upps;
    public $table;
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->first();
    }
    
    public function destroy()
    {
        MonevRow::find($this->row)->delete();
        
        return redirect()->route('dashboard.monev.show', ['upps' => $this->upps, 'slug' => $this->slug])->with('success', 'Successfully deleted data '. $this->table->name);
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.delete', [
            'row' => $this->row,
            'slug' => $this->slug,
            'upps' => $this->upps
        ]);
    }
}
