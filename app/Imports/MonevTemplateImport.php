<?php

namespace App\Imports;

use App\Models\MonevRow;
use App\Models\MonevTable;
use App\Models\MonevField;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class MonevTemplateImport implements ToCollection
{
    protected $table;
    protected $programStudi;
    protected $periode;

    public function __construct(MonevTable $table, $programStudi, $periode)
    {
        $this->table = $table;
        $this->programStudi = $programStudi;
        $this->periode = $periode;
    }

    public function collection(Collection $rows)
    {
        // ambil field sesuai urutan export
        $fields = MonevField::where('monev_table_id', $this->table->id)
            ->pluck('name')
            ->toArray();

        // skip header row (row pertama)
        foreach ($rows->skip(1) as $row) {
            $data = [];

            foreach ($fields as $i => $field) {
                $data[$field] = $row[$i] ?? null;
            }

            
            MonevRow::create([
                'periode_id' => $this->periode->id,
                'monev_table_id' => $this->table->id,
                'program_studi_id' => $this->programStudi->id,
                'data' => $data,
            ]);
        }
    }
}
