<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MonevTable;
use App\Models\MonevField;

class MonevTableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Data Mahasiswa',
                'slug' => 'mahasiswa',
                'fields' => [
                    ['name' => 'NIM', 'type' => 'string'],
                    ['name' => 'Nama', 'type' => 'string'],
                    ['name' => 'Angkatan', 'type' => 'integer'],
                ],
            ],
            [
                'name' => 'Data Dosen',
                'slug' => 'dosen',
                'fields' => [
                    ['name' => 'NIP', 'type' => 'string'],
                    ['name' => 'Nama', 'type' => 'string'],
                    ['name' => 'Jabatan', 'type' => 'string'],
                ],
            ],
            [
                'name' => 'Data Penelitian',
                'slug' => 'penelitian',
                'fields' => [
                    ['name' => 'Judul', 'type' => 'string'],
                    ['name' => 'Tahun', 'type' => 'integer'],
                    ['name' => 'Pendanaan', 'type' => 'string'],
                ],
            ],
        ];

        foreach ($tables as $tableData) {
            $fields = $tableData['fields'];
            unset($tableData['fields']);

            $table = MonevTable::updateOrCreate(
                ['slug' => $tableData['slug']],
                $tableData
            );

            foreach ($fields as $field) {
                MonevField::updateOrCreate(
                    [
                        'monev_table_id' => $table->id,
                        'name' => $field['name'],
                    ],
                    ['type' => $field['type']]
                );
            }
        }
    }
}