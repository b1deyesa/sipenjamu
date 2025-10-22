<?php

namespace App\Livewire\Dashboard\Monev;

use Livewire\Component;
use App\Models\MonevTable;
use App\Models\Periode;

class Read extends Component
{
    public Periode $periode;
    public $programStudi;
    public $slug;
    public $table;
    public $tables;
    public $searchField = [];
    public $fields = [];
    
    public function mount()
    {
        $this->table = MonevTable::with([
            'rows' => function ($q) {
                $q->where('periode_id', $this->periode->id);
            },
            'fields' // pastikan relasi fields ada di model MonevTable
        ])->where('slug', $this->slug)->firstOrFail();        

        $fieldNames = $this->table->fields()
            ->orderBy('id')
            ->pluck('name')
            ->toArray();

        $this->tables = $this->table->rows
            ->where('program_studi_id', $this->programStudi->id)
            ->map(function ($row) use ($fieldNames) {
                $data = (array) $row->data;

                $orderedData = collect($fieldNames)
                    ->filter(fn($key) => array_key_exists($key, $data))
                    ->mapWithKeys(fn($key) => [$key => $data[$key]])
                    ->toArray();

                $searchableText = collect($orderedData)->map(function ($value) {
                    if (is_array($value)) {
                        return implode(' ', $value);
                    } elseif (!is_string($value)) {
                        return (string) json_encode($value);
                    }
                    return $value;
                })->join(' ');

                return (object) array_merge([
                    'id' => $row->id,
                    'searchable_text' => $searchableText,
                ], $orderedData);
            })
            ->sortBy('id')
            ->values();

        $firstRow = $this->tables->first();

        $this->searchField = $firstRow 
            ? collect(array_keys(get_object_vars($firstRow)))
                ->reject(fn ($key) => in_array($key, ['id', 'searchable_text']))
                ->mapWithKeys(fn ($key) => [$key => $key])
                ->all()
            : [];
                
        $this->fields = $fieldNames;
    }
    
    public function render()
    {
        return view('livewire.dashboard.monev.read', [
            'programStudi' => $this->programStudi,
            'slug' => $this->slug,
            'periode' => $this->periode,
        ]);
    }
}