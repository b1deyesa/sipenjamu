<?php

namespace App\Exports;

use App\Models\MonevField;
use Maatwebsite\Excel\Concerns\FromArray;

class MonevTemplateExport implements FromArray
{
    protected $tableId;

    public function __construct($tableId)
    {
        $this->tableId = $tableId;
    }

    public function array(): array
    {
        // Ambil semua field berdasarkan table_id
        $fields = MonevField::where('monev_table_id', $this->tableId)
            ->pluck('name')
            ->toArray();

        // Hanya baris pertama (header)
        return [$fields];
    }
}