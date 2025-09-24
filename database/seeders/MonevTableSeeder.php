<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MonevTable;

class MonevTableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            [
                'name' => 'Data Mahasiswa',
                'slug' => 'mahasiswa',
                'fields' => json_encode([
                    ['id' => 1, 'name' => 'NIM', 'type' => 'string'],
                    ['id' => 2, 'name' => 'Nama', 'type' => 'string'],
                    ['id' => 3, 'name' => 'Angkatan', 'type' => 'integer'],
                ]),
            ],
            [
                'name' => 'Data Dosen',
                'slug' => 'dosen',
                'fields' => json_encode([
                    ['id' => 1, 'name' => 'NIP', 'type' => 'string'],
                    ['id' => 2, 'name' => 'Nama', 'type' => 'string'],
                    ['id' => 3, 'name' => 'Jabatan', 'type' => 'string'],
                ]),
            ],
            [
                'name' => 'Data Penelitian',
                'slug' => 'penelitian',
                'fields' => json_encode([
                    ['id' => 1, 'name' => 'Judul', 'type' => 'string'],
                    ['id' => 2, 'name' => 'Tahun', 'type' => 'integer'],
                    ['id' => 3, 'name' => 'Pendanaan', 'type' => 'string'],
                ]),
            ],
        ];
        
        foreach ($tables as $table) {
            MonevTable::updateOrCreate(
                ['slug' => $table['slug']],
                $table
            );
        }        
    }
}