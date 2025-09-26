<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevTable;

class Read extends Component
{
    public $upps;
    public $slug;
    public $table;
    public $tables;
    public $searchField = [];
    public $fields = [];
    
    public function mount()
    {
        $this->table = MonevTable::where('slug', $this->slug)->firstOrFail();

        $this->tables = $this->table->rows
            ->where('upps_id', $this->upps->id)
            ->map(function ($row) {
                $data = (array) $row->data;

                // siapkan text untuk pencarian sekali saja
                $searchableText = collect($data)->map(function ($value) {
                    if (is_array($value)) {
                        return implode(' ', $value);
                    } elseif (!is_string($value)) {
                        return (string) json_encode($value);
                    }
                    return $value;
                })->join(' ');

                return (object) array_merge(['id' => $row->id, 'searchable_text' => $searchableText], $data);
            });

        $firstRow = $this->tables->first();
        $this->searchField = $firstRow 
            ? collect(array_keys(get_object_vars($firstRow)))
                ->reject(fn ($key) => in_array($key, ['id', 'searchable_text']))
                ->mapWithKeys(fn ($key) => [$key => $key])
                ->all()
            : [];

        $this->fields = $this->table->fields
            ? json_decode($this->table->fields, true)
            : [];
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.read', [
            'upps' => $this->upps,
            'slug' => $this->slug
        ]);
    }
}